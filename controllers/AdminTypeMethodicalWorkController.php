<?php

namespace app\controllers;

use app\models\tables\TypeMethodicalWork;
use app\models\tables\Request;
use app\models\filters\TypeMethodicalWorkFilter;
use app\models\filters\RequestFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * AdminTypeMethodicalWorkController implements the CRUD actions for TypeMethodicalWork model.
 */
class AdminTypeMethodicalWorkController extends Controller
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
     * Lists all TypeMethodicalWork models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TypeMethodicalWorkFilter();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort = false;

        $arrIdTypeMethodicalWorks = NULL;
        $arrIdMethodicalWorks = NULL;
        $idRequest = NULL;

        $academicYear = empty(\Yii::$app->request->get('year')) ? \Yii::$app->params['currentAcademicYear'] : \Yii::$app->request->get('year');
        $user = \Yii::$app->user->id;

        //пользователь авторизован
        if (!is_null($user)) {
            $searchModelRequest = new RequestFilter();
            $dataProviderRequest = $searchModelRequest->search([
                'table_name' => 'methodical_work',
                'academic_year' => $academicYear,
                'users_id_request' => $user
            ]);

            //существуют записи пользователя
            $arrayRequest = ArrayHelper::getColumn($dataProviderRequest->getKeys(), 'id');
    
            //TODO Предусмотреть, что запрос не может быть пустым!!! те если удалены все виды работ из запроса, то он не существует
            if (!empty($arrayRequest)) {
                $idRequest = $arrayRequest[0];
                //select id, type_methodical_work_id from MethodicalWork
                $arrIdMethodicalWorks = Request::findOne($idRequest)->getIdTypeMethodicalWorks();
                //select type_methodical_work_id from MethodicalWork
                $arrIdTypeMethodicalWorks = ArrayHelper::getColumn($arrIdMethodicalWorks, 'type_methodical_work_id');
            }           
        }     

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrIdTypeMethodicalWorks' => $arrIdTypeMethodicalWorks,
            'arrIdMethodicalWorks' => $arrIdMethodicalWorks,
            'idRequest' => $idRequest
        ]);
    }

    /**
     * Displays a single TypeMethodicalWork model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TypeMethodicalWork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TypeMethodicalWork();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TypeMethodicalWork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TypeMethodicalWork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TypeMethodicalWork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TypeMethodicalWork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TypeMethodicalWork::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
