<?php

use app\models\tables\TypeMethodicalWork;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\filters\TypeMethodicalWorkFilter $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Type Methodical Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-methodical-work-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Type Methodical Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'gridTypeMethodicalWork',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
            ],
            'name',
            [
                'class' => ActionColumn::className(),
                'template' => '{update}',
                'urlCreator' => function ($action, $model, $key, $index) {    
                  if ($action === 'update') {
                      $url ='index.php?r=admin-methodical-work%2Fcreate&id='.$model->id;
                      return $url;
                  }    
                }
                ],
        ],
        'rowOptions' => function ($model) {
                return ['class' => 'rowGrid'];
    },
    ]); ?>


</div>
