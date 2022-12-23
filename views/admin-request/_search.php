<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\filters\RequestFilter $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'table_name') ?>

    <?= $form->field($model, 'date_request') ?>

    <?= $form->field($model, 'date_response') ?>

    <?= $form->field($model, 'academic_year') ?>

    <?php // echo $form->field($model, 'users_id_request') ?>

    <?php // echo $form->field($model, 'users_id_response') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'response_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
