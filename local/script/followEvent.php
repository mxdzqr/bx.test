<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);

/** @global CUser $USER */
/** @global CDatabase $DB */
function eventList(){
    global $DB;

    $today = time();
    $currentMonth = intval(date("n", $today));

    $arFilter = Array(
        "ACTIVE" => "Y", ">=". 'DATE_ACTIVE_FROM' => date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")), mktime(0,0,0,$currentMonth,1)), "IBLOCK_ID" => 5);

    $dbItems = CIBlockElement::GetList(array('DATE_ACTIVE_FROM'=>"ASC", "ID"=>"ASC"), $arFilter, false, false, Array("ID"));

    while($arItem = $dbItems->GetNext())
        $arEventList[] = $arItem['ID'];

    return $arEventList;
}

if (isset($_POST['send']) && $_POST['send'] === 'sendEvent') {

    if (is_numeric($_POST['event'])) {

        $arResult = \Bitrix\Main\UserTable::getList([
            'select' => ['UF_SUBSCRIBE_EVENTS'],
            'filter' => ['ID' => $USER->GetID()]])->fetch();
        $eventList = eventList();

        if (in_array($_POST['event'], $eventList)) {

            if (!in_array($_POST['event'], $arResult['UF_SUBSCRIBE_EVENTS'])) {

                $arResult['UF_SUBSCRIBE_EVENTS'][] = $_POST['event'];

                $user = new CUser;
                $fields = Array("UF_SUBSCRIBE_EVENTS" => $arResult['UF_SUBSCRIBE_EVENTS']);
                $user->Update($USER->GetID(), $fields);
            }
        }
    }
}
