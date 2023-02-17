<?php

use \yii\widgets\DetailView;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Методическая работа</h2>

                <?= DetailView::widget([
                    'model' => $modelMethodicalWork,
                    'attributes' => [
                        [
                            'label' => 'Планируемая нагрузка в часах (I полугодие)',
                            'value' => $modelMethodicalWork['loadPlanOne'],
                            'visible' => !empty($modelMethodicalWork['loadPlanOne'])
                        ],
                        [
                            'label' => 'Фактическая нагрузка в часах (I полугодие)',
                            'value' => $modelMethodicalWork['loadFactOne'],
                            'visible' => !empty($modelMethodicalWork['loadFactOne'])
                        ],
                        [
                            'label' => 'Планируемая нагрузка в часах (II полугодие)',
                            'value' => $modelMethodicalWork['loadPlanTwo'],
                            'visible' => !empty($modelMethodicalWork['loadPlanTwo'])
                        ],
                        [
                            'label' => 'Фактическая нагрузка в часах (II полугодие)',
                            'value' => $modelMethodicalWork['loadFactTwo'],
                            'visible' => !empty($modelMethodicalWork['loadFactTwo'])
                        ],
                        [
                            'label' => 'Статус проверки',
                            'value' => $modelMethodicalWork['response'],
                            'visible' => !empty($modelMethodicalWork['response'])
                        ]
                    ],

                ]) ?>

                <p>
                <?= Html::a('Редактировать', ['/admin-type-methodical-work/start&id=' . $modelMethodicalWork['requestId']], ['class' => 'btn btn-outline-primary']) ?>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Научно-исследовательская работа</h2>

                <p><a class="btn btn-outline-primary" href="http://www.yiiframework.com/forum/">Редактировать</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Воспитательная работа</h2>

                <p><a class="btn btn-outline-primary" href="http://www.yiiframework.com/extensions/">Редактировать</a></p>
            </div>
        </div>

    </div>
</div>
