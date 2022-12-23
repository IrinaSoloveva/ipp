<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\tables\Request $model */

$this->title = 'Update Request: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'users_id_request' => $model->users_id_request, 'users_id_response' => $model->users_id_response, 'status_id' => $model->status_id, 'response_id' => $model->response_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
