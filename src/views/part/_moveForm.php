<?php

use hipanel\helpers\Url;
use hipanel\widgets\Box;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$scenario = $this->context->action->scenario;
?>
<?php $form = ActiveForm::begin([
    'id' => 'dynamic-form',
    'enableClientValidation' => true,
    'validateOnBlur' => true,
    'enableAjaxValidation' => true,
    'validationUrl' => Url::toRoute(['validate-form', 'scenario' => reset($models)->isNewRecord ? 'create' : 'update']),
]) ?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 99, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => reset($models),
    'formId' => 'dynamic-form',
    'formFields' => [
        'part'
    ],
]) ?>
<div class="container-items">
    <?php foreach ($models as $i => $model) : ?>
        <?php
        // necessary for update action.
        $model->scenario = $scenario;
        print Html::activeHiddenInput($model, "[$i]id");
        ?>
        <div class="item">
            <?php Box::begin() ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, "[$i]partno")->textInput(['readonly' => true]) ?>
                    <?= $form->field($model, "[$i]serial")->textInput(['readonly' => true]) ?>
                    <?= $form->field($model, "[$i]dst_id")->textInput(['readonly' => true]) ?>
                    <?= $form->field($model, "[$i]type")->dropDownList($moveTypes) ?>
                    <?= $form->field($model, "[$i]remote_ticket")->textInput(['readonly' => true]) ?>
                    <?= $form->field($model, "[$i]hm_ticket")->textInput(['readonly' => true]) ?>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <?php Box::end() ?>
        </div>
        <!-- /.item -->
    <?php endforeach; ?>
</div>
<!-- /.container-items -->

<?php DynamicFormWidget::end() ?>
<?php Box::begin(['options' => ['class' => 'box-solid']]) ?>
<div class="row">
    <div class="col-md-12 no">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-default']) ?>
        &nbsp;
        <?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default', 'onclick' => 'history.go(-1)']) ?>
    </div>
    <!-- /.col-md-12 -->
</div>
<!-- /.row -->
<?php Box::end() ?>
<?php ActiveForm::end() ?>
