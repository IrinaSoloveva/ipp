<?php

namespace app\controllers;

use app\models\tables\Users;
use app\models\filters\UsersFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminUsersController implements the CRUD actions for Users model.
 */
class AdminUsersController extends Controller
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
     * Lists all Users models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsersFilter();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param int $id ID
     * @param int $department_id Department ID
     * @param int $group_id
     * @param int $status_id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $department_id, $group_id, $status_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $department_id, $group_id, $status_id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'department_id' => $model->department_id, 'group_id' => $model->group_id, 'status_id' => $model->status_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $department_id Department ID
     * @param int $group_id
     * @param int $status_id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $department_id, $group_id, $status_id)
    {
        $model = $this->findModel($id, $department_id, $group_id, $status_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'department_id' => $model->department_id, 'group_id' => $model->group_id, 'status_id' => $model->status_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $department_id Department ID
     * @param int $group_id
     * @param int $status_id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $department_id, $group_id, $status_id)
    {
        $this->findModel($id, $department_id, $group_id, $status_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $department_id Department ID
     * @param int $group_id
     * @param int $status_id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $department_id, $group_id, $status_id)
    {
        if (($model = Users::findOne(['id' => $id, 'department_id' => $department_id, 'group_id' => $group_id, 'status_id' => $status_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
