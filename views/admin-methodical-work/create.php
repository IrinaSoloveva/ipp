<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\MethodicalWork $model */

$this->title = 'Create Methodical Work';
$this->params['breadcrumbs'][] = ['label' => 'Methodical Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="methodical-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
