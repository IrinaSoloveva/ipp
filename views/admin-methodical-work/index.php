<?php

use app\models\tables\MethodicalWork;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\filters\MethodicalWorkFilter $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Methodical Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="methodical-work-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Methodical Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'discipline_one',
            'load_plan_one',
            'load_fact_one',
            'mark_date_one',
            //'mark_number_one',
            //'discipline_two',
            //'load_plan_two',
            //'load_fact_two',
            //'mark_date_two',
            //'mark_number_two',
            //'type_methodical_work_id',
            //'request_id',
            //'mark_name_one_id',
            //'mark_name_two_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MethodicalWork $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'type_methodical_work_id' => $model->type_methodical_work_id, 'request_id' => $model->request_id, 'mark_name_one_id' => $model->mark_name_one_id, 'mark_name_two_id' => $model->mark_name_two_id]);
                 }
            ],
        ],
    ]); ?>


</div>
