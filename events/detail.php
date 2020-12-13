<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Events");

?>
    <div class="container">
        <div class="row">

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.detail",
                        "",
                        Array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "ADD_ELEMENT_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "BROWSER_TITLE" => "-",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "N",
                            "CHECK_DATES" => "N",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "N",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "ELEMENT_CODE" => "",
                            "ELEMENT_ID" => $_REQUEST['ID'],
                            "FIELD_CODE" => array("ID","NAME"),
                            "IBLOCK_ID" => "5",
                            "IBLOCK_TYPE" => "events",
                            "IBLOCK_URL" => "",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "MESSAGE_404" => "",
                            "META_DESCRIPTION" => "-",
                            "META_KEYWORDS" => "-",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_TITLE" => "Страница",
                            "PROPERTY_CODE" => array("",""),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_CANONICAL_URL" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "STRICT_SECTION_CHECK" => "N",
                            "USE_PERMISSIONS" => "N",
                            "USE_SHARE" => "N"
                        )
                    );?>
                </div>
                <div class="col-md-3"></div>

        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>