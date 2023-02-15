<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\tables\Request $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'users_id_request' => $model->users_id_request, 'users_id_response' => $model->users_id_response, 'status_id' => $model->status_id, 'response_id' => $model->response_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'users_id_request' => $model->users_id_request, 'users_id_response' => $model->users_id_response, 'status_id' => $model->status_id, 'response_id' => $model->response_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'table_name',
            'date_request',
            'date_response',
            'academic_year',
            'users_id_request',
            'users_id_response',
            'status_id',
            'response_id',
        ],
    ]) ?>

</div>
