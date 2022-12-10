<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\TypeEducationalWork $model */

$this->title = 'Update Type Educational Work: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Educational Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-educational-work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
