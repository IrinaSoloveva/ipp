<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\TypeEducationalWork $model */

$this->title = 'Create Type Educational Work';
$this->params['breadcrumbs'][] = ['label' => 'Type Educational Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-educational-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
