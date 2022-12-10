<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\tables\MethodicalWork $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Methodical Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="methodical-work-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'type_methodical_work_id' => $model->type_methodical_work_id, 'request_id' => $model->request_id, 'mark_name_one_id' => $model->mark_name_one_id, 'mark_name_two_id' => $model->mark_name_two_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'type_methodical_work_id' => $model->type_methodical_work_id, 'request_id' => $model->request_id, 'mark_name_one_id' => $model->mark_name_one_id, 'mark_name_two_id' => $model->mark_name_two_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'discipline_one',
            'load_plan_one',
            'load_fact_one',
            'mark_date_one',
            'mark_number_one',
            'discipline_two',
            'load_plan_two',
            'load_fact_two',
            'mark_date_two',
            'mark_number_two',
            'type_methodical_work_id',
            'request_id',
            'mark_name_one_id',
            'mark_name_two_id',
        ],
    ]) ?>

</div>
