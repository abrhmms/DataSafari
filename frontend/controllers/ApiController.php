<?php

namespace frontend\controllers;

use common\models\Animal;
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
class ApiController extends Controller
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
                        'actions' => ['mapa'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'mapa' => ['get'],
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
    public function actionMapa()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $puntos = PuntosMapa::find()
            ->select("*")
            ->asArray()
            ->all();

        return $puntos;
    }

    public function actionAnimales()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        $animales = Animal::find()
            ->with(['filo', 'clase', 'orden', 'familia', 'genero', 'especies', 'habitat']) 
            ->asArray() 
            ->all();

        return $animales;
    }
    

  
}
