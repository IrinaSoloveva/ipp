<?php

use app\models\tables\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\filters\RequestFilter $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'table_name',
            'date_request',
            'date_response',
            'academic_year',
            //'users_id_request',
            //'users_id_response',
            //'status_id',
            //'response_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'users_id_request' => $model->users_id_request, 'users_id_response' => $model->users_id_response, 'status_id' => $model->status_id, 'response_id' => $model->response_id]);
                 }
            ],
        ],
    ]); ?>


</div>
