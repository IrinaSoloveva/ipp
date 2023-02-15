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

$this->title = 'Методическая работа';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="type-methodical-work-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Удалить записи', ['id' => 'butDeleteTypeMethodicalWork', 'class' => 'btn btn-dark disabled', 'data-idRequest' => $idRequest]) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'gridTypeMethodicalWork',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
            ],
            [
                'attribute' => 'name',
                'label' => 'Вид методической работы',
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{update}{delete}',
                'urlCreator' => function ($action, $model, $key, $index) use ($arrIdTypeMethodicalWorks, $arrIdMethodicalWorks, $idRequest) {    
                  if ($action === 'update') {
                    if (!is_null($arrIdTypeMethodicalWorks)) {
                        $key = array_search($model['id'], $arrIdTypeMethodicalWorks);
                        if (is_int($key)) 
                            return '/index.php?r=admin-methodical-work%2Fupdate&id=' . $arrIdMethodicalWorks[$key]['id'];
                        else 
                            return '/index.php?r=admin-methodical-work%2Fcreate&id=' . $model->id . '&request=' . $idRequest;
                    }
                        // не существует пустого запроса, те все переменные одновременно null  
                        // если пользователь не авторизован ссылка не активна
                        else if (\Yii::$app->user->id) 
                            return '/index.php?r=admin-methodical-work%2Fcreate&id=' . $model->id; 
                  }
                  if ($action === 'delete') {
                    if (!is_null($arrIdTypeMethodicalWorks)) {
                        $key = array_search($model['id'], $arrIdTypeMethodicalWorks);
                        if (is_int($key)) 
                            return '/index.php?r=admin-methodical-work%2Fdelete&id=' . $arrIdMethodicalWorks[$key]['id'] . '&request=' . $idRequest;
                    }
                  }                                 
                }
            ],
        ],
        'rowOptions' => function ($model, $key, $index, $grid) use ($arrIdTypeMethodicalWorks) {
                if ((!is_null($arrIdTypeMethodicalWorks)) && (in_array($model['id'], $arrIdTypeMethodicalWorks))) 
                    return ['class' => 'rowGrid list-group-item-primary selectionTypeMethodicalWorks'];
                else 
                    return ['class' => 'rowGrid'];
        },
    ]); ?>


</div>
