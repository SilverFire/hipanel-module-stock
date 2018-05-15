<?php

use hipanel\modules\stock\widgets\combo\PartnoCombo;
use hiqdev\assets\icheck\iCheckAsset;
use hiqdev\combo\StaticCombo;
/**
 * @var \hipanel\widgets\AdvancedSearch $search
 */
iCheckAsset::register($this);

$this->registerJs("jQuery('.field-modelsearch-show_hidden_from_user input[type=checkbox]').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_flat',
    increaseArea: '20%' // optional
});");

?>

<div class="col-md-12">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('type')->widget(StaticCombo::class, [
            'data' => $types,
            'hasId' => true,
            'multiple' => false,
        ]) ?>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('brand')->widget(StaticCombo::class, [
            'data' => $brands,
            'hasId' => true,
            'multiple' => false,
        ]) ?>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('state')->widget(StaticCombo::class, [
            'data'      => $states,
            'hasId'     => true,
            'multiple'  => false,
        ]) ?>
    </div>
</div>


<div class="col-md-12">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('filter_like') ?>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('model_like') ?>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('descr_like') ?>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('partno_like') ?>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('group_like') ?>
    </div>

    <!--- Fake place -->
    <div class="col-md-4 col-sm-6 col-xs-12">
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('show_hidden_from_user')->checkbox() ?>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <?= $search->field('hide_unavailable')->checkbox() ?>
    </div>
</div>

