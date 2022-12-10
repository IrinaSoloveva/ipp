<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\TypeMethodicalWork $model */

$this->title = 'Create Type Methodical Work';
$this->params['breadcrumbs'][] = ['label' => 'Type Methodical Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-methodical-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
