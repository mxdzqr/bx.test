<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");
$arSelect = array("ID", "NAME","PROPERTY_FOLLOW", "DETAIL_PAGE_URL");
$arFilter = array("IBLOCK_ID" => 6, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "PROPERTY_FOLLOW_VALUE" => 1);
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement()) {
    $arResult['READ_LATER'][] = $ob->GetFields();
}
