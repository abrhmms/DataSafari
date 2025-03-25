<?php

namespace frontend\controllers;

use common\models\Animal;
use common\models\AnimalSearch;
use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\PuntosMapa;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\data\ActiveDataProvider;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $rol = Yii::$app->user->identity->rol;

            switch ($rol) {
                case 'admin':
                    Yii::$app->layout = '@frontend/views/admin/layouts/main'; // 💡 FORZAMOS EL LAYOUT
                    return $this->redirect(['/admin/dashboard-admin']);
                case 'cuidador':
                    return $this->redirect(['/cuidador/dashboard-cuidador']);
                case 'veterinario':
                    return $this->redirect(['/veterinario/dashboard-veterinario']);
                default:
                    return $this->goHome();
            }
        }

        // 🚀 Si el formulario no se envió o falló, renderiza la vista de login
        return $this->render('login', ['model' => $model]);
    }

    public function actionDashboard()
    {
        return $this->render('dashboard_admin');
    }



    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionMapa()
    {
        return $this->render('mapa');
    }

    public function actionCatalogo()
    {
        $searchModel = new AnimalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        return $this->render('catalogo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider->getModels(),
        ]);
    }
    

    public function actionMapaZoo()
    {
        $puntosMapa = PuntosMapa::find()->all(); // Obtener todos los puntos del mapa
        return $this->render('mapazoo', [
            'puntosMapa' => $puntosMapa
        ]);
    }


    public function actionMapaUser()
    {
        return $this->render('mapauser');
    }


    public function actionGuardarPunto()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        $request = Yii::$app->request;
        if ($request->isPost) {
            $punto = new PuntosMapa();
            $punto->x = $request->post('x');
            $punto->y = $request->post('y');
            $punto->nombre = $request->post('nombre');
            $punto->descripcion = $request->post('descripcion');
            $punto->tiene_animales = $request->post('tiene_animales');
        
            // ✅ Asegurar que se está importando correctamente
            $imagen = UploadedFile::getInstanceByName('imagen');
        
            if ($imagen) {
                $rutaImagen = 'img/zonas/' . uniqid() . '.' . $imagen->extension;
                if ($imagen->saveAs(Yii::getAlias('@webroot') . '/' . $rutaImagen)) {
                    $punto->imagen = $rutaImagen; // Guardamos la ruta en la BD
                }
            }
        
            if ($punto->save()) {
                return [
                    'mensaje' => 'Punto guardado correctamente.',
                    'puntoId' => $punto->id,
                ];
            } else {
                return ['error' => 'Error al guardar el punto.'];
            }
        }
        
        
        return ['error' => 'Método no permitido.'];
    }
    




    /**
     * Acción para obtener todos los puntos de la base de datos en formato JSON.
     */
    public function actionObtenerPuntos()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $puntos = PuntosMapa::find()
            ->select("*")
            ->asArray()
            ->all();

        return $puntos;
    }

    public function actionObtenerAnimales($punto_id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $animales = Animal::find()
            ->where(['punto_id' => $punto_id])  // Filtra por la zona seleccionada
            ->select(['nombre', 'edad', 'peso', 'imagen'])
            ->asArray()
            ->all();

        return $animales;
    }
}
