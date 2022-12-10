<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\MethodicalWork $model */

$this->title = 'Update Methodical Work: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Methodical Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'type_methodical_work_id' => $model->type_methodical_work_id, 'request_id' => $model->request_id, 'mark_name_one_id' => $model->mark_name_one_id, 'mark_name_two_id' => $model->mark_name_two_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="methodical-work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
