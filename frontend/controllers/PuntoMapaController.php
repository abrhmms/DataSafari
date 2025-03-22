<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\PuntoMapa;
use common\models\PuntosMapa;

class PuntoMapaController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return PuntosMapa::find()->all();
    }

    public function actionGuardar()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;

        $punto = new PuntosMapa();
        $punto->nombre = $request->post('nombre');
        $punto->descripcion = $request->post('descripcion');
        $punto->x = $request->post('x');
        $punto->y = $request->post('y');

        if ($punto->save()) {
            return ['mensaje' => 'Punto guardado'];
        } else {
            return ['error' => 'No se pudo guardar'];
        }
    }
}


?>