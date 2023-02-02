<?php

use app\models\tables\TypeMethodicalWork;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\filters\TypeMethodicalWorkFilter $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\controllers\AdminTypeMethodicalWorkController $arrIdTypeMethodicalWorks, $arrIdMethodicalWorks, $idRequest */

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
                'urlCreator' => function ($action, $model, $key, $index) use ($arrIdTypeMethodicalWorks, $arrIdMethodicalWorks, $idRequest) {    
                  if ($action === 'update') {
                    if (!is_null($arrIdTypeMethodicalWorks)) {
                        $key = array_search($model['id'], $arrIdTypeMethodicalWorks);
                        if (is_int($key)) 
                            return '/index.php?r=admin-methodical-work%2Fupdate&id=' . $arrIdMethodicalWorks[$key]['id'] . '&request=' . $idRequest;
                        else 
                            return '/index.php?r=admin-methodical-work%2Fcreate&id=' . $model->id . '&request=' . $idRequest;
                      }
                    // не существует пустого запроса, те все переменные одновременно null  
                    else if (is_null($arrIdTypeMethodicalWorks)) 
                      return '/index.php?r=admin-methodical-work%2Fcreate&id=' . $model->id; 
                  }                                 
                }
            ],
        ],
        'rowOptions' => function ($model, $key, $index, $grid) use ($arrIdTypeMethodicalWorks) {
                if ((!is_null($arrIdTypeMethodicalWorks)) && (in_array($model['id'], $arrIdTypeMethodicalWorks))) 
                    return ['class' => 'rowGrid list-group-item-success selectionTypeMethodicalWorks'];
                else 
                    return ['class' => 'rowGrid'];
        },
    ]); ?>


</div>
