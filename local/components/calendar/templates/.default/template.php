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
<h3>Calendar</h3>
<div class="row">
    <? foreach ($arResult['EVENTS'] as $key => $arMonth): ?>
        <? $num = count($arMonth); ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header"><?= GetMessage("IBL_NEWS_CAL_M_" . $key ) ?></div>
                <ul class="list-group list-group-flush">
                    <? foreach ($arMonth as $key => $arDay): ?>
                        <? if($key <= 1): ?>
                            <li class="list-group-item">
                                <h6><?= $arDay['NAME'] ?></h6>
                                <p>test</p>
                            </li>
                        <? endif; ?>
                    <? endforeach; ?>
                </ul>
                <? if ($num == 1): ?>
                    <? if (!in_array($arMonth[0]['ID'], $arResult['FOLLOW_EVENTS']['UF_SUBSCRIBE_EVENTS'])): ?>
                        <form id="followEventForm" >
                            <input type="hidden" name="event" value="<?= $arMonth[0]['ID'] ?>">
                            <input type="hidden" name="send" value="sendEvent">
                            <input class="col-lg-12" type="submit" id="followEvent" value="Follow">
                        </form>
                    <? else: ?>
                        <div class="col-lg-12">
                            <p>You follow to <strong>event</strong>.</p>
                        </div>
                    <? endif; ?>
                <? else: ?>
                    <div class="card-footer">Events: <?= $num ?></div>
                <? endif; ?>
            </div>
        </div>
    <? endforeach; ?>
</div>


