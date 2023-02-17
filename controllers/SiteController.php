<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\tables\Users;
use app\models\tables\Request;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $academicYear = \Yii::$app->session->get('academicYear');
        $user = \Yii::$app->user->id;
        $modelMethodicalWork = NULL;

        //пользователь авторизован
        if (!is_null($user)) {

            $modelMethodicalWork = $this->getMethodicalWork($academicYear, $user);
            //$modelScientificWork = $this->getScientificWork($academicYear, $user);
            //$modelEducationalWork = $this->getEducationalWork($academicYear, $user);  
            
            return $this->render('index', ['modelMethodicalWork' => $modelMethodicalWork]);
        }     

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    protected function getMethodicalWork ($academicYear, $userId, $arrayLoad=[]) {
        $request = Request::findOne([
            'table_name' => 'methodical_work',
            'academic_year' => $academicYear,
            'users_id_request' => $userId,
        ]); 

        // существуют записи
        if (!is_null($request)) {
            $arrayLoad["loadPlanOne"] = $request->getSumOnePlanMethodicalWorks();
            $arrayLoad["loadFactOne"] = $request->getSumOneFactMethodicalWorks();
            $arrayLoad["loadPlanTwo"] = $request->getSumTwoPlanMethodicalWorks();
            $arrayLoad["loadFactTwo"] = $request->getSumTwoFactMethodicalWorks();
            $arrayLoad["response"] = $request->getResponse();
            $arrayLoad["requestId"] = (string) $request->id;
            return $arrayLoad;
        } else {
            return $arrayLoad;
        }   
    }

    protected function getScientificWork ($academicYear, $userId, $arrayLoad) {
        
    }

    protected function getEducationalWork ($academicYear, $userId, $arrayLoad) {
        
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Get the academicYear from the session.
     * If the academicYear is not found in the session, return the current year.
     *
     * @return string
     */
    public function actionSessionGet()
    {
        $session = Yii::$app->session;
        if (!$session->isActive) $session->open();

        if (!is_null($session['academicYear'])) echo $session['academicYear'];
        else echo date ('Y');
    }

    /**
     * Set the academicYear from the GET.
     * If the academicYear is not found in the GET, set the current year.
     */
    public function actionSessionSet()
    {
        $session = Yii::$app->session;
        if (!$session->isActive) $session->open();

        $year = \Yii::$app->request->get('year');

        if (!is_null($year)) $session['academicYear'] = $year;
        else $session['academicYear'] = date ('Y');
    }

}
