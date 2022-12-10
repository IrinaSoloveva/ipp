<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\TypeMethodicalWork $model */

$this->title = 'Update Type Methodical Work: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Methodical Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-methodical-work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
