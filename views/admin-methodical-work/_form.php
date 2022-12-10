<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\tables\MethodicalWork $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="methodical-work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'discipline_one')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'load_plan_one')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'load_fact_one')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mark_date_one')->textInput() ?>

    <?= $form->field($model, 'mark_number_one')->textInput() ?>

    <?= $form->field($model, 'discipline_two')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'load_plan_two')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'load_fact_two')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mark_date_two')->textInput() ?>

    <?= $form->field($model, 'mark_number_two')->textInput() ?>

    <?= $form->field($model, 'type_methodical_work_id')->textInput() ?>

    <?= $form->field($model, 'request_id')->textInput() ?>

    <?= $form->field($model, 'mark_name_one_id')->textInput() ?>

    <?= $form->field($model, 'mark_name_two_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
