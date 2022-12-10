<?php

namespace app\controllers;

use app\models\tables\MethodicalWork;
use app\models\filters\MethodicalWorkFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminMethodicalWorkController implements the CRUD actions for MethodicalWork model.
 */
class AdminMethodicalWorkController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MethodicalWork models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MethodicalWorkFilter();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MethodicalWork model.
     * @param int $id ID
     * @param int $type_methodical_work_id Type Methodical Work ID
     * @param int $request_id Request ID
     * @param int $mark_name_one_id Mark Name One ID
     * @param int $mark_name_two_id Mark Name Two ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $type_methodical_work_id, $request_id, $mark_name_one_id, $mark_name_two_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $type_methodical_work_id, $request_id, $mark_name_one_id, $mark_name_two_id),
        ]);
    }

    /**
     * Creates a new MethodicalWork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MethodicalWork();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'type_methodical_work_id' => $model->type_methodical_work_id, 'request_id' => $model->request_id, 'mark_name_one_id' => $model->mark_name_one_id, 'mark_name_two_id' => $model->mark_name_two_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MethodicalWork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $type_methodical_work_id Type Methodical Work ID
     * @param int $request_id Request ID
     * @param int $mark_name_one_id Mark Name One ID
     * @param int $mark_name_two_id Mark Name Two ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $type_methodical_work_id, $request_id, $mark_name_one_id, $mark_name_two_id)
    {
        $model = $this->findModel($id, $type_methodical_work_id, $request_id, $mark_name_one_id, $mark_name_two_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'type_methodical_work_id' => $model->type_methodical_work_id, 'request_id' => $model->request_id, 'mark_name_one_id' => $model->mark_name_one_id, 'mark_name_two_id' => $model->mark_name_two_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MethodicalWork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $type_methodical_work_id Type Methodical Work ID
     * @param int $request_id Request ID
     * @param int $mark_name_one_id Mark Name One ID
     * @param int $mark_name_two_id Mark Name Two ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $type_methodical_work_id, $request_id, $mark_name_one_id, $mark_name_two_id)
    {
        $this->findModel($id, $type_methodical_work_id, $request_id, $mark_name_one_id, $mark_name_two_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MethodicalWork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $type_methodical_work_id Type Methodical Work ID
     * @param int $request_id Request ID
     * @param int $mark_name_one_id Mark Name One ID
     * @param int $mark_name_two_id Mark Name Two ID
     * @return MethodicalWork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $type_methodical_work_id, $request_id, $mark_name_one_id, $mark_name_two_id)
    {
        if (($model = MethodicalWork::findOne(['id' => $id, 'type_methodical_work_id' => $type_methodical_work_id, 'request_id' => $request_id, 'mark_name_one_id' => $mark_name_one_id, 'mark_name_two_id' => $mark_name_two_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
