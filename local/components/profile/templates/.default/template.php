<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?= $arResult['LOGIN']?></h4>
                                <a href="/profile/edit" class="btn btn-outline-primary">Edit profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a class="text-center" id="checkReadLater" href="javascript:void(0)">Читать позже</a>
                </div>
                <? if (!empty($arResult['NAME']) && !empty($arResult['SECOND_NAME']) && !empty($arResult['LAST_NAME'])): ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Задать вопрос</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn ">Submit</button>
                            </form>
                        </div>
                    </div>
                <? else: ?>
                    <div class="card">
                        <div class="card-body">
                            <span>Заполните профиль если хотите задать вопрос.</span>
                        </div>
                    </div>
                <? endif; ?>
            </div>
            <div id="fio" class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3"><h6 class="mb-0">ФИО</h6></div>
                            <div class="col-sm-9 text-secondary"><?= $arResult['LAST_NAME'] . ' ' . $arResult['NAME'] . ' ' . $arResult['SECOND_NAME'] ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3"><h6 class="mb-0">E-mail</h6></div>
                            <div class="col-sm-9 text-secondary"><?= $arResult['EMAIL'] ?></div>
                        </div>
                        <? if($arResult['EVENTS']): ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6 class="mb-0">Предстоящие мероприятия</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-secondary">
                                    <? foreach ($arResult['EVENTS'] as $arEvents):  ?>
                                        <a class="badge badge-info" href="<?= $arEvents['DETAIL_PAGE_URL'] ?>"><?= ConvertDateTime($arEvents['ACTIVE_FROM'], "DD.MM.YYYY", "ru") ?></a>
                                    <? endforeach; ?>
                                </div>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <?$APPLICATION->IncludeComponent(
                    "calendar",
                    "",
                    Array(
                        "IBLOCK_ID" => "5",
                        "IBLOCK_TYPE" => "events",
                    )
                );?>
                <hr>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news",
                    "articles",
                    Array(
                        "ADD_ELEMENT_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "BROWSER_TITLE" => "-",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "N",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "N",
                        "CHECK_DATES" => "Y",
                        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
                        "DETAIL_DISPLAY_TOP_PAGER" => "N",
                        "DETAIL_FIELD_CODE" => array("NAME","TAGS", "DATE_CREATE"),
                        "DETAIL_PAGER_SHOW_ALL" => "N",
                        "DETAIL_PAGER_TEMPLATE" => "",
                        "DETAIL_PAGER_TITLE" => "Страница",
                        "DETAIL_PROPERTY_CODE" => array("VIEW",""),
                        "DETAIL_SET_CANONICAL_URL" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FILTER_FIELD_CODE" => array("TAGS","DATE_CREATE"),
                        "FILTER_NAME" => "",
                        "FILTER_PROPERTY_CODE" => array("VIEW",""),
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "6",
                        "IBLOCK_TYPE" => "articles",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "LIST_FIELD_CODE" => array("NAME","TAGS", "DATE_CREATE"),
                        "LIST_PROPERTY_CODE" => array("VIEW",""),
                        "MESSAGE_404" => "",
                        "META_DESCRIPTION" => "-",
                        "META_KEYWORDS" => "-",
                        "NEWS_COUNT" => "5",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "SEF_MODE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N",
                        "USE_CATEGORIES" => "N",
                        "USE_FILTER" => "Y",
                        "USE_PERMISSIONS" => "N",
                        "USE_RATING" => "N",
                        "USE_RSS" => "N",
                        "USE_SEARCH" => "Y",
                        "USE_SHARE" => "N",
                        "VARIABLE_ALIASES" => Array("ELEMENT_ID"=>"ELEMENT_ID","SECTION_ID"=>"SECTION_ID")
                    )
                );?>
            </div>
            <div id="readLaterList" class="col-md-8" style="display: none">
                <? foreach ($arResult['READ_LATER'] as $arRead): ?>
                <p class="news-item">
                    <a href="<?echo $arRead["DETAIL_PAGE_URL"]?>"><b><?echo $arRead["NAME"]?></b></a><br />
                </p>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</div>
