<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\tables\Request $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'table_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_request')->textInput() ?>

    <?= $form->field($model, 'date_response')->textInput() ?>

    <?= $form->field($model, 'academic_year')->textInput() ?>

    <?= $form->field($model, 'users_id_request')->textInput() ?>

    <?= $form->field($model, 'users_id_response')->textInput() ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

    <?= $form->field($model, 'response_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
