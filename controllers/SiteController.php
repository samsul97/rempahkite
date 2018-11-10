<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Daftar;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function verifyCode()
    {
        return[
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
        $this->layout = '@app/views/layouts/pengunjung/main';
        return $this->render('index');
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

    public function actionDaftar()
    {
        $this->layout = 'main-login';
        $model = new Daftar();
        if ($model->load(Yii::$app->request->post()))
        {
            $customer = new Customer();
            $customer->nama = $model->nama;    
            $customer->email = $model->email;    
            $customer->alamat = $model->alamat;    
            $customer->jenis_kelamin = $model->jenis_kelamin;    
            $customer->no_telp = $model->no_telp;
            $customer->status = 1;
            $customer->save();

            $user = new User();
            $user->id_customer = $customer->id;
            $user->id_user_role = $customer->id;
            $user->username = $model->username;    
            $user->password = $model->password;    
            $user->id_operator = 0;    
            $user->id_user_role = 2;    
            $user->status = 1;
            $user->token = Yii::$app->getSecurity()->generateRandomString ($length=50);
            $user->save();

            return $this->redirect(['site/login']);
        }

        return $this->render('daftar', [
            'model' => $model,
        ]);
    }

    public function actionBeranda()
    {
        if (User::isAdmin())
        {
            return $this->render('beranda');
        }
        elseif (User::isCustomer()) {
            return $this->render('beranda');
        }
        elseif (User::isOperator()) {
            return $this->render('beranda');
        }
        else
        {
            return $this->redirect(['site/login']);
        }
        // return $this->render('dashboard');
    }


}
