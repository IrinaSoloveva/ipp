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

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card h-100">
                    <h5 class="card-header">Методическая работа</h5>
                    <img src="img/3.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <? if (empty($modelMethodicalWork)) {
                                echo Html::a('Заполнить', ['/admin-type-methodical-work'], ['class' => 'btn btn-outline-primary']);
                            } else {           
                                echo DetailView::widget([
                                    'model' => $modelMethodicalWork,
                                    'attributes' => [
                                        [
                                            'label' => 'Планируемая нагрузка в часах<br/> (I полугодие)',
                                            'value' => $modelMethodicalWork['loadPlanOne'],
                                            'visible' => !empty($modelMethodicalWork['loadPlanOne'])
                                        ],
                                        [
                                            'label' => 'Фактическая нагрузка в часах<br/> (I полугодие)',
                                            'value' => $modelMethodicalWork['loadFactOne'],
                                            'visible' => !empty($modelMethodicalWork['loadFactOne'])
                                        ],
                                        [
                                            'label' => 'Планируемая нагрузка в часах<br/> (II полугодие)',
                                            'value' => $modelMethodicalWork['loadPlanTwo'],
                                            'visible' => !empty($modelMethodicalWork['loadPlanTwo'])
                                        ],
                                        [
                                            'label' => 'Фактическая нагрузка в часах<br/> (II полугодие)',
                                            'value' => $modelMethodicalWork['loadFactTwo'],
                                            'visible' => !empty($modelMethodicalWork['loadFactTwo'])
                                        ],
                                        [
                                            'label' => 'Статус проверки',
                                            'value' => $modelMethodicalWork['response'],
                                            'visible' => !empty($modelMethodicalWork['response'])
                                        ]
                                    ],
                                ]);
                                echo Html::a('Редактировать', ['/admin-type-methodical-work'], ['class' => 'btn btn-outline-primary']); 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <h5 class="card-header">Методическая работа</h5>
                    <img src="img/4.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <? if (empty($modelMethodicalWork)) {
                                echo Html::a('Заполнить', ['/admin-type-methodical-work'], ['class' => 'btn btn-outline-primary']);
                            } else {           
                                echo DetailView::widget([
                                    'model' => $modelMethodicalWork,
                                    'attributes' => [
                                        [
                                            'label' => 'Планируемая нагрузка в часах<br/> (I полугодие)',
                                            'value' => $modelMethodicalWork['loadPlanOne'],
                                            'visible' => !empty($modelMethodicalWork['loadPlanOne'])
                                        ],
                                        [
                                            'label' => 'Фактическая нагрузка в часах<br/> (I полугодие)',
                                            'value' => $modelMethodicalWork['loadFactOne'],
                                            'visible' => !empty($modelMethodicalWork['loadFactOne'])
                                        ],
                                        [
                                            'label' => 'Планируемая нагрузка в часах<br/> (II полугодие)',
                                            'value' => $modelMethodicalWork['loadPlanTwo'],
                                            'visible' => !empty($modelMethodicalWork['loadPlanTwo'])
                                        ],
                                        [
                                            'label' => 'Фактическая нагрузка в часах<br/> (II полугодие)',
                                            'value' => $modelMethodicalWork['loadFactTwo'],
                                            'visible' => !empty($modelMethodicalWork['loadFactTwo'])
                                        ],
                                        [
                                            'label' => 'Статус проверки',
                                            'value' => $modelMethodicalWork['response'],
                                            'visible' => !empty($modelMethodicalWork['response'])
                                        ]
                                    ],
                                ]);
                                echo Html::a('Редактировать', ['/admin-type-methodical-work'], ['class' => 'btn btn-outline-primary']); 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <h5 class="card-header">Методическая работа</h5>
                    <img src="img/5.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <? if (empty($modelMethodicalWork)) {
                                echo Html::a('Заполнить', ['/admin-type-methodical-work'], ['class' => 'btn btn-outline-primary']);
                            } else {           
                                echo DetailView::widget([
                                    'model' => $modelMethodicalWork,
                                    'attributes' => [
                                        [
                                            'label' => 'Планируемая нагрузка в часах<br/> (I полугодие)',
                                            'value' => $modelMethodicalWork['loadPlanOne'],
                                            'visible' => !empty($modelMethodicalWork['loadPlanOne'])
                                        ],
                                        [
                                            'label' => 'Фактическая нагрузка в часах<br/> (I полугодие)',
                                            'value' => $modelMethodicalWork['loadFactOne'],
                                            'visible' => !empty($modelMethodicalWork['loadFactOne'])
                                        ],
                                        [
                                            'label' => 'Планируемая нагрузка в часах<br/> (II полугодие)',
                                            'value' => $modelMethodicalWork['loadPlanTwo'],
                                            'visible' => !empty($modelMethodicalWork['loadPlanTwo'])
                                        ],
                                        [
                                            'label' => 'Фактическая нагрузка в часах<br/> (II полугодие)',
                                            'value' => $modelMethodicalWork['loadFactTwo'],
                                            'visible' => !empty($modelMethodicalWork['loadFactTwo'])
                                        ],
                                        [
                                            'label' => 'Статус проверки',
                                            'value' => $modelMethodicalWork['response'],
                                            'visible' => !empty($modelMethodicalWork['response'])
                                        ]
                                    ],
                                ]);
                                echo Html::a('Редактировать', ['/admin-type-methodical-work'], ['class' => 'btn btn-outline-primary']); 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <h5 class="card-header">Методическая работа</h5>
                    <img src="img/6.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <? if (empty($modelMethodicalWork)) {
                                echo Html::a('Заполнить', ['/admin-type-methodical-work'], ['class' => 'btn btn-outline-primary']);
                            } else {           
                                echo DetailView::widget([
                                    'model' => $modelMethodicalWork,
                                    'attributes' => [
                                        [
                                            'label' => 'Планируемая нагрузка в часах<br/> (I полугодие)',
                                            'value' => $modelMethodicalWork['loadPlanOne'],
                                            'visible' => !empty($modelMethodicalWork['loadPlanOne'])
                                        ],
                                        [
                                            'label' => 'Фактическая нагрузка в часах<br/> (I полугодие)',
                                            'value' => $modelMethodicalWork['loadFactOne'],
                                            'visible' => !empty($modelMethodicalWork['loadFactOne'])
                                        ],
                                        [
                                            'label' => 'Планируемая нагрузка в часах<br/> (II полугодие)',
                                            'value' => $modelMethodicalWork['loadPlanTwo'],
                                            'visible' => !empty($modelMethodicalWork['loadPlanTwo'])
                                        ],
                                        [
                                            'label' => 'Фактическая нагрузка в часах<br/> (II полугодие)',
                                            'value' => $modelMethodicalWork['loadFactTwo'],
                                            'visible' => !empty($modelMethodicalWork['loadFactTwo'])
                                        ],
                                        [
                                            'label' => 'Статус проверки',
                                            'value' => $modelMethodicalWork['response'],
                                            'visible' => !empty($modelMethodicalWork['response'])
                                        ]
                                    ],
                                ]);
                                echo Html::a('Редактировать', ['/admin-type-methodical-work'], ['class' => 'btn btn-outline-primary']); 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
