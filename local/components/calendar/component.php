<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

if($arParams["TYPE"] || !in_array($arParams["DATE_FIELD"], array("DATE_ACTIVE_FROM", "DATE_ACTIVE_TO", "TIMESTAMP_X", "DATE_CREATE")))
	$arParams["DATE_FIELD"] = "DATE_ACTIVE_FROM";

$arParams["DETAIL_URL"]=trim($arParams["DETAIL_URL"]);

$today = time();

$currentMonth = intval($_REQUEST[$arParams["MONTH_VAR_NAME"]]);

if($currentMonth<1 || $currentMonth>12)
	$currentMonth = intval(date("n", $today));

$currentYear = intval($_REQUEST[$arParams["YEAR_VAR_NAME"]]);
if($currentYear<1)
	$currentYear = intval(date("Y", $today));

if($this->StartResultCache())
{

	if(!CModule::IncludeModule("iblock"))
	{
		$this->AbortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}

	$MonthName = GetMessage("IBL_NEWS_CAL_M_".date("n", mktime(0, 0, 0, $currentMonth, 1, $currentYear)));

		$arFilter = Array(
			"ACTIVE" => "Y",
			">=".$arParams["DATE_FIELD"] => date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")),
				mktime(0,0,0,$currentMonth,1)),

			"IBLOCK_ID" => $arParams["IBLOCK_ID"]
		);

		//$arSelectedFields = Array("ACTIVE", $arParams["DATE_FIELD"], "ID", "DETAIL_PAGE_URL", "NAME", "PREVIEW_TEXT");
		$arSelectedFields = Array("ID", "NAME", "DETAIL_PAGE_URL", "LIST_PAGE_URL");

		$dbItems = CIBlockElement::GetList(array($arParams["DATE_FIELD"]=>"ASC", "ID"=>"ASC"), $arFilter, false, false, $arSelectedFields);
		$dbItems->SetUrlTemplates($arParams["DETAIL_URL"]);

		while($arItem = $dbItems->GetNext()) {
			$numMonth = explode('.', $arItem['ACTIVE_FROM']);
			$arResult['EVENTS'][$numMonth[1]][] = $arItem;
		}

		$arResult['FOLLOW_EVENTS'] = \Bitrix\Main\UserTable::getList([
			'select' => ['UF_SUBSCRIBE_EVENTS'],
			'filter' => ['ID' => $USER->GetID()]])->fetch();

	$this->SetResultCacheKeys(array(
		"TITLE",
	));
	$this->IncludeComponentTemplate();
}
?>
