<?php

use hipanel\modules\client\widgets\combo\ClientCombo;
use hipanel\modules\stock\widgets\combo\CompanyCombo;
use hipanel\modules\stock\widgets\combo\DestinationCombo;
use hipanel\modules\stock\widgets\combo\OrderCombo;
use hipanel\modules\stock\widgets\combo\PartCombo;
use hipanel\modules\stock\widgets\combo\PartnoCombo;
use hipanel\modules\stock\widgets\combo\SourceCombo;
use hipanel\modules\stock\widgets\RangeCombo;
use hiqdev\combo\StaticCombo;
use hipanel\widgets\RefCombo;
use hipanel\widgets\DateTimePicker;
use hiqdev\yii2\daterangepicker\DateRangePicker;
use yii\helpers\Html;

/**
 * @var array $locations
 * @var \yii\web\View $this
 * @var \hipanel\models\IndexPageUiOptions $uiModel
 * @var \hipanel\widgets\AdvancedSearch $search
 */
?>


<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('partno_inilike')->widget(PartnoCombo::class, [
        'multiple' => true, 'primaryFilter' => 'partno_inilike',
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('model_types')->widget(RefCombo::class, [
        'gtype' => 'type,model',
        'multiple' => true,
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('state')->widget(RefCombo::class, [
        'gtype' => 'state,part',
        'multiple' => false,
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('model_brands')->widget(RefCombo::class, [
        'gtype' => 'type,brand',
        'multiple' => true,
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12"><?= $search->field('serial_ilike') ?></div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('id_in')->widget(PartCombo::class, [
        'hasId' => true,
        'multiple' => true,
        'current' => array_combine((array)$search->model->id_in, (array)$search->model->id_in),
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12"><?= $search->field('move_descr_ilike') ?></div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('src_name_in')->widget(RangeCombo::class, [
        'name' => 'src_ids',
        'useDstTypes' => false,
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('dst_name_in')->widget(RangeCombo::class, [
        'name' => 'dst_ids',
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('company_id')->widget(CompanyCombo::class) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('place_in')->widget(StaticCombo::class, [
        'data' => $locations,
        'hasId' => true,
        'multiple' => true,
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('currency')->widget(StaticCombo::class, [
        'data' => ['usd' => 'USD', 'eur' => 'EUR'],
        'hasId' => true,
        'multiple' => false,
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12"><?= $search->field('limit') ?></div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <div class="form-group">
        <?= Html::tag('label', Yii::t('hipanel:stock', 'Last move date'), ['class' => 'control-label']); ?>
        <?= DateTimePicker::widget([
            'id' => 'move_time_date-picker',
            'model' => $search->model,
            'attribute' => 'move_time',
            'clientOptions' => [
                'autoclose' => true,
                'minView' => 2,
                'format' => 'yyyy-mm-dd',
            ],
        ]) ?>
    </div>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <div class="form-group">
        <?= Html::tag('label', Yii::t('hipanel:stock', 'Created range'), ['class' => 'control-label']) ?>
        <?= DateRangePicker::widget([
            'id' => 'create_time-date-range-picker',
            'model' => $search->model,
            'attribute' => 'create_time_from',
            'attribute2' => 'create_time_till',
            'options' => [
                'class' => 'form-control',
            ],
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
    </div>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('buyer_in')->widget(ClientCombo::class, [
        'multiple' => true,
    ]) ?>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
    <?= $search->field('order_id')->widget(OrderCombo::class) ?>
</div>

<?php if ($uiModel->representation === 'profit-report'): ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            <?= Html::tag('label', Yii::t('hipanel:stock', 'Profit period'), ['class' => 'control-label']); ?>
            <?= DateRangePicker::widget([
                'model' => $search->model,
                'attribute' => 'profit_time_from',
                'attribute2' => 'profit_time_till',
                'options' => [
                    'class' => 'form-control',
                ],
                'dateFormat' => 'yyyy-mm-dd',
            ]) ?>
        </div>
    </div>
<?php endif ?>
