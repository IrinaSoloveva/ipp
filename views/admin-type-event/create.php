<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\TypeEvent $model */

$this->title = 'Create Type Event';
$this->params['breadcrumbs'][] = ['label' => 'Type Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
