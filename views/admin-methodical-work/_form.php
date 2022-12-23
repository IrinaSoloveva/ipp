<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\tables\MethodicalWork $model */
/** @var app\controllers\AdminMethodicalWorkController $itemTypeEvent */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="methodical-work-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>
    <div class="d-grid gap-2">
        <a class="btn btn-outline-secondary btn-lg btn-lg" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
            <h4>I ПОЛУГОДИЕ</h4>
        </a>
    </div>

    <div class="collapse" id="collapseExample1">
        <?= $form->field($model, 'discipline_one')->textInput(['maxlength' => true])->label('Дисциплина (шифр специальности, направления подготовки)') ?>

        <?= $form->field($model, 'load_plan_one')->textInput(['maxlength' => true])->label('Планируемая работа (в часах)') ?>

        <?= $form->field($model, 'load_fact_one')->textInput(['maxlength' => true])->label('Фактическая работа (в часах)') ?>

        <?= $form->field($model, 'mark_name_one_id')->dropdownList($itemTypeEvent)->label('Отметка о выполнении (мероприятие)') ?>

        <?= $form->field($model,'mark_date_one')->widget(DatePicker::class, [
            'language' => 'ru',
            'dateFormat' => 'dd.MM.yyyy',
            'options' => [
                //'placeholder' => Yii::$app->formatter->asDate($model->created_at),
                'class'=> 'form-control',
                'autocomplete'=>'off'
            ],
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '2015:2050',
                //'showOn' => 'button',
                //'buttonText' => 'Выбрать дату',
                //'buttonImageOnly' => true,
                //'buttonImage' => 'images/calendar.gif'
            ]])->label('Отметка о выполнении (дата)') ?>

        <?= $form->field($model, 'mark_number_one')->textInput()->label('Отметка о выполнении (номер протокола)') ?>     
    </div>

    <br>
    <div class="d-grid gap-2">
        <a class="btn btn-outline-secondary btn-lg btn-lg" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <h4>II ПОЛУГОДИЕ</h4>
        </a>
    </div>

    <div class="collapse" id="collapseExample">
        <?= $form->field($model, 'discipline_two')->textInput(['maxlength' => true])->label('Дисциплина (шифр специальности, направления подготовки)') ?>

        <?= $form->field($model, 'load_plan_two')->textInput(['maxlength' => true])->label('Планируемая работа (в часах)') ?>

        <?= $form->field($model, 'load_fact_two')->textInput(['maxlength' => true])->label('Фактическая работа (в часах)') ?>

        <?= $form->field($model, 'mark_name_two_id')->dropdownList($itemTypeEvent)->label('Отметка о выполнении (мероприятие)') ?>

        <?= $form->field($model,'mark_date_two')->widget(DatePicker::class, [
            'language' => 'ru',
            'dateFormat' => 'dd.MM.yyyy',
            'options' => [
                //'placeholder' => Yii::$app->formatter->asDate($model->created_at),
                'class'=> 'form-control',
                'autocomplete'=>'off'
            ],
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '2015:2050',
                //'showOn' => 'button',
                //'buttonText' => 'Выбрать дату',
                //'buttonImageOnly' => true,
                //'buttonImage' => 'images/calendar.gif'
            ]])->label('Отметка о выполнении (дата)') ?>

        <?= $form->field($model, 'mark_number_two')->textInput()->label('Отметка о выполнении (номер протокола)') ?>     
    </div>

    <div class="form-group">
        <br>
        <?= Html::tag('a', 'Назад', ['class' => 'btn btn-outline-success btn-lg', 'href' => '/index.php?r=admin-type-methodical-work', 'role' => 'button']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
