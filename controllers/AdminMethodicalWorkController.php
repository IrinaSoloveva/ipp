<?php

namespace app\controllers;

use app\models\tables\MethodicalWork;
use app\models\tables\TypeEvent;
use app\models\tables\Request;
use app\models\tables\TypeMethodicalWork;
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
     * Creates a new MethodicalWork model from the teacher (status 1).
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the user not found
     */
    public function actionCreate()
    {
        $user = \Yii::$app->user->id;

        // TODO - не предусмотрен статус пользователя !=1
        //пользователь авторизован
        if ($user) {
            $model = new MethodicalWork();

            $idTypeMethodicalWork = \Yii::$app->request->get('id');
            $idRequest = \Yii::$app->request->get('request');
            $newRequest = false;
    
            if ($this->request->isPost) {
                if ($model->load($this->request->post())) { 
                    
                    if (is_null($idRequest)) {
                        $idRequest = $this->createRequest($user);
                        $newRequest = true;
                    } 
                                     
                    if ((!is_null($idRequest)) && (!is_null($idTypeMethodicalWork))) {
                        $model->request_id = $idRequest;
                        $model->type_methodical_work_id = $idTypeMethodicalWork;
                        if  ($model->save()) {
                            return $this->redirect('/index.php?r=admin-type-methodical-work', 301)->send();
                        } else {
                            if ($newRequest) $this->deleteRequest($idRequest);
                            \Yii::$app->session->setFlash('warning', 'Ошибка записи');
                            //return $this->redirect('/index.php?r=admin-type-methodical-work', 301)->send();
                        }       
                    }
                                                              
                }
            } else {
                $model->loadDefaultValues();
            }
    
            return $this->render('create', [
                'model' => $model,
                'itemTypeEvent' => $this->getModelTypeEvent(),
                'nameTypeMethodicalWork' => $this->getNameTypeMethodicalWork($idTypeMethodicalWork),
            ]);
        }
        else {
            throw new NotFoundHttpException('Авторизуйтесь.');
        }
    
    }

    /**
     * Updates an existing MethodicalWork model.
     * If update is successful, the browser will be redirected to the 'view' page [[TypeMethodicalWork]].
     * @param int $id ID
     * @param int $type_methodical_work_id Type Methodical Work ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModelById($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()) {
                return $this->redirect('/index.php?r=admin-type-methodical-work', 301)->send();
            }
            else {
                \Yii::$app->session->setFlash('error', 'Ошибка записи');
                return $this->redirect('/index.php?r=admin-type-methodical-work', 301)->send();
            }
        }

        return $this->render('update', [
            'model' => $model,
            'itemTypeEvent' => $this->getModelTypeEvent(),
            'nameTypeMethodicalWork' => $this->getNameTypeMethodicalWork($model->type_methodical_work_id),
        ]);
    }

    /**
     * Deletes an existing MethodicalWork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $request)
    {
        $model = $this->findModelById($id);
        if ($model->delete()) {
            if ($this->controlDeleteRequest($request)) $this->deleteRequest($request);
            return $this->redirect('/index.php?r=admin-type-methodical-work', 301)->send();
        }
        else {
            \Yii::$app->session->setFlash('error', 'Ошибка удаления');
            return $this->redirect('/index.php?r=admin-type-methodical-work', 301)->send();
        }
    }

    /**
     * Deletes an existing MethodicalWork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param array $id ID
     * @return \yii\web\Response
     */
    public function actionDeleteMultiple()
    {
        $arrayCheckboxKeys = $_POST['arrayCheckboxKeys'];
        $idRequest = $_POST['idRequest'];

        $arr = json_decode($arrayCheckboxKeys, true);

        $del = MethodicalWork::deleteAll(['and', ['in', 'type_methodical_work_id', $arr], ['=', 'request_id', $idRequest]]);
        if ($del == 0) {
            \Yii::$app->session->setFlash('warning', 'Ошибка удаления');
        } else {
            if ($this->controlDeleteRequest($idRequest)) $this->deleteRequest($idRequest);
        }
        return $this->redirect('/index.php?r=admin-type-methodical-work', 301)->send();
    }

    /**
     * Get the number of records [[MethodicalWorks]] include in request
     * If the number of records = 0 return true
     * @param int $id ID
     * @return boolean
     */
    protected function controlDeleteRequest($id) {
        $request = Request::findOne($id);
        $requestCount = $request->getCountMethodicalWorks();
        return $requestCount == 0;
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

    /**
     * Finds the MethodicalWork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MethodicalWork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModelById($id)
    {
        if (($model = MethodicalWork::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Get the TypeEvent model as a 'name' column
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return array from the 'name' column
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function getModelTypeEvent()
    {
        if ($modelTypeEvent = TypeEvent::find()->select(['name'])->indexBy('id')->column()) {
            return $modelTypeEvent;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Request.
     * @param int $userId ID
     * @return integer id new Request
     */
    protected function createRequest($userId)
    {
        $model = new Request();

            $model->table_name = 'methodical_work';
            $model->date_request = \Yii::$app->formatter->asDate('now', 'yyyy.MM.dd');
            $model->academic_year = \Yii::$app->session->get('academicYear');
            $model->users_id_request = $userId;
            $model->status_id = '1';
            $model->response_id = '1';
 
        if ($model->save()) {
            return $model->id;
        } else {
            \Yii::$app->session->setFlash('warning', 'Ошибка записи');
        }          
    }

    /**
     * Deletes a new Request model.
     * @param int $id ID
     * @return string|\yii\web\Response
     */
    protected function deleteRequest($id) {
        $request = Request::findOne($id);
        if ($request !== null) {
            $request->delete();
        } else {
            \Yii::$app->session->setFlash('warning', 'Ошибка записи');
        }
    }

    /**
     * Gets name for [[TypeMethodicalWork]].
     * @param int $id ID
     * @return string name
     */
    protected function getNameTypeMethodicalWork($id) {
        $model = TypeMethodicalWork::findOne($id);
        if ($model !== null) {
            return $model->name;
        } else {
            \Yii::$app->session->setFlash('warning', 'Ошибка записи');
        }   
    }

}
