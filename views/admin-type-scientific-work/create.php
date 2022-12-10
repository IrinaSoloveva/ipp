<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\TypeScientificWork $model */

$this->title = 'Create Type Scientific Work';
$this->params['breadcrumbs'][] = ['label' => 'Type Scientific Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-scientific-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
