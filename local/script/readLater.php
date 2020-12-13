<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);

/** @global CUser $USER */
/** @global CDatabase $DB */
CModule::IncludeModule("iblock");

if (isset($_POST['send']) && $_POST['send'] === 'sendRead') {

    if (is_numeric($_POST['read'])) {

        $arSelect = array("ID");
        $arFilter = array("IBLOCK_ID" => 6, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNext()) {
            $arRead[] = $ob['ID'];
        }

        if (in_array($_POST['read'], $arRead)) {
            CIBlockElement::SetPropertyValuesEx($_POST['read'], 6, array('FOLLOW' => 10));
        }
    }
}

