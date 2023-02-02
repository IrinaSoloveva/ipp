<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\MethodicalWork $model */
/** @var app\controllers\AdminMethodicalWorkController $itemTypeEvent, $nameTypeMethodicalWork */

$this->title = 'Методическая работа';
$this->params['breadcrumbs'][] = ['label' => 'Методическая работа', 'url' => ['/admin-type-methodical-work']];
$this->params['breadcrumbs'][] = 'Добавить';
?>
<div class="methodical-work-create">

    <h3><?= Html::encode($nameTypeMethodicalWork) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'itemTypeEvent' => $itemTypeEvent
    ]) ?>

</div>
