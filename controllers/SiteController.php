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
use app\models\Forget;
use app\models\RegistrasiAdmin;
use app\models\Operator;
use app\models\User;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use app\models\Customer;
use app\models\LoginForms;


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
        if (!Yii::$app->user->isGuest)
        {
            return $this->redirect(['site/dashboard']);
        }
        else
        {
            $this->layout = '@app/views/layouts/pengunjung/main';
            return $this->render('index');
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
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

    public function actionLogins()
    {
        $this->layout = '@app/views/layouts/pengunjung/main';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/logins']);
        }

        $model = new LoginForms();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('logins', [
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

        return $this->redirect(['site/login']);
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
        if ($model->load(Yii::$app->request->post()) && $model->validate())
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
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);   
            $user->id_operator = 0;    
            $user->id_user_role = 2;    
            $user->status = 1;
            $user->token = Yii::$app->getSecurity()->generateRandomString ($length=50);
            $user->save();
            Yii::$app->session->setFlash('success', 'Berhasil Registrasi. Silahkan Login.');
            
            return $this->redirect(['site/logins']);
        }

        return $this->render('daftar', [
            'model' => $model,
        ]);
    }

    public function actionDashboard()
    {

        if (User::isAdmin() || User::isOperator() || User::isCustomer()) {
            $provider = new ActiveDataProvider([
                'query' => \app\models\Produk::find(),
                'pagination' => [
                    'pageSize' => 6
                ],
            ]);
            return $this->render('dashboard', ['provider' => $provider]);
        }
        else
        {
            return $this->redirect('site/login');
        }
    }

    public function actionForget()
    {
        $this->layout = 'main-login';
        $model = new Forget();
        if ($model->load(Yii::$app->request->post()))
        {
            return $this->redirect(['site/login']);
        }

        return $this->render('forget', [
            'model' => $model,
        ]);
    }

    public function actionRegistrasiAdmin()
    {
        $this->layout = 'main-login';
        $model = new RegistrasiAdmin();
        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $operator = new Operator();
            $operator->nama = $model->nama;
            $operator->alamat = $model->alamat;
            $operator->email = $model->email;
            $operator->no_telp = $model->no_telp;
            $operator->status = 1;

            $foto = UploadedFile::getInstance($model, 'foto');
            $model->foto = time(). '_' . $foto->name;
            $foto->saveAs(Yii::$app->basePath. '/web/user/' . $model->foto);
            $operator->foto = $model->foto;
            $operator->save();

            $user = new User();
            $user->username = $model->username;
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $user->id_operator = $operator->id;
            $user->id_user_role = $operator->id;
            $user->id_customer = 0;    
            $user->id_user_role = 3;
            $user->status = 1;
            $user->token = Yii::$app->getSecurity()->generateRandomString ($length=50);
            $user->save();
            Yii::$app->session->setFlash('success', 'Berhasil Registrasi. Silahkan Login.');
            return $this->redirect(['site/login']);
        }
        return $this->render('registrasiadmin', [
            'model' => $model,
        ]);
    }
}
