<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\filters\MethodicalWorkFilter $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="methodical-work-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'discipline_one') ?>

    <?= $form->field($model, 'load_plan_one') ?>

    <?= $form->field($model, 'load_fact_one') ?>

    <?= $form->field($model, 'mark_date_one') ?>

    <?php // echo $form->field($model, 'mark_number_one') ?>

    <?php // echo $form->field($model, 'discipline_two') ?>

    <?php // echo $form->field($model, 'load_plan_two') ?>

    <?php // echo $form->field($model, 'load_fact_two') ?>

    <?php // echo $form->field($model, 'mark_date_two') ?>

    <?php // echo $form->field($model, 'mark_number_two') ?>

    <?php // echo $form->field($model, 'type_methodical_work_id') ?>

    <?php // echo $form->field($model, 'request_id') ?>

    <?php // echo $form->field($model, 'mark_name_one_id') ?>

    <?php // echo $form->field($model, 'mark_name_two_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
