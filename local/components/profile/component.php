<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

function sortData($a, $b){
    if ($a["TIMESTAMP_X_UNIX"] == $b["TIMESTAMP_X_UNIX"]) {
        return 0;
    }
    return (strtotime($a["TIMESTAMP_X_UNIX"]) < strtotime($b["TIMESTAMP_X_UNIX"])) ? -1 : 1;
}

if($this->startResultCache())
{

    CModule::IncludeModule("iblock");
    $arResult = \Bitrix\Main\UserTable::getList([
        'select' => [
            'ID',
            'NAME',
            'EMAIL',
            'SECOND_NAME',
            'LAST_NAME',
            'UF_SUBSCRIBE_EVENTS',
        ],
        'filter' => ['ID' => $USER->GetID()]])->fetch();

    $today = time();
    $currentMonth = intval(date("n", $today));
    $arFilter = Array(
        "ACTIVE" => "Y",
        ">="."ACTIVE_FROM" => date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")),
            mktime(0,0,0,$currentMonth,1)),

        "IBLOCK_ID" => 5
    );

    $arSelectedFields = Array("ID", 'ACTIVE_FROM', "DETAIL_PAGE_URL", "TIMESTAMP_X_UNIX");

    $dbItems = CIBlockElement::GetList(array($arParams["DATE_FIELD"]=>"ASC", "ID"=>"ASC"), $arFilter, false, false, $arSelectedFields);
    $dbItems->SetUrlTemplates($arParams["DETAIL_URL"]);

    while($arItem = $dbItems->GetNext()) {
        $numMonth = explode('.', $arItem['ACTIVE_FROM']);
        if(in_array($arItem['ID'], $arResult['UF_SUBSCRIBE_EVENTS']))
            $arResult['EVENTS'][] = $arItem;
    }
    usort($arResult['EVENTS'], "sortData");

	$this->setResultCacheKeys(array(
		"ID",
		"NAME",
        'EMAIL',
		"SECOND_NAME",
		"LAST_NAME",
		"UF_SUBSCRIBE_EVENTS",
		"EVENTS",
	));
	$this->includeComponentTemplate();
}
