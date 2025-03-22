<?php

namespace frontend\controllers;

use common\models\HorariosAlimentacion;
use common\models\HorariosAlimentacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HorariosAlimentacionController implements the CRUD actions for HorariosAlimentacion model.
 */
class HorariosAlimentacionController extends Controller
{
    public $layout = '@frontend/views/cuidador/layouts/main'; // Asegura que use el layout correcto

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
     * Lists all HorariosAlimentacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HorariosAlimentacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HorariosAlimentacion model.
     * @param int $id_horarios_alimentacion Id Horarios Alimentacion
     * @param int $id_alimentacion Id Alimentacion
     * @param int $id_especies Id Especies
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_horarios_alimentacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_horarios_alimentacion),
        ]);
    }

    /**
     * Creates a new HorariosAlimentacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new HorariosAlimentacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_horarios_alimentacion' => $model->id_horarios_alimentacion, 'id_alimentacion' => $model->id_alimentacion, 'id_especies' => $model->id_especies]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HorariosAlimentacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_horarios_alimentacion Id Horarios Alimentacion
     * @param int $id_alimentacion Id Alimentacion
     * @param int $id_especies Id Especies
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_horarios_alimentacion)
    {
        $model = $this->findModel($id_horarios_alimentacion);
    
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_horarios_alimentacion' => $model->id_horarios_alimentacion]);
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HorariosAlimentacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_horarios_alimentacion Id Horarios Alimentacion
     * @param int $id_alimentacion Id Alimentacion
     * @param int $id_especies Id Especies
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_horarios_alimentacion)
    {
        $this->findModel($id_horarios_alimentacion)->delete();
        return $this->redirect(['index']);
    }

    public function actionAlimentar($id)
{
    $model = HorariosAlimentacion::findOne($id);
    if ($model) {
        $model->alimentado = 1; // Marcar como alimentado
        $model->save(false);
    }
    return $this->redirect(['index']); // Redirigir de vuelta al listado
}

    /**
     * Finds the HorariosAlimentacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_horarios_alimentacion Id Horarios Alimentacion
     * @param int $id_alimentacion Id Alimentacion
     * @param int $id_especies Id Especies
     * @return HorariosAlimentacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_horarios_alimentacion)
    {
        if (($model = HorariosAlimentacion::findOne($id_horarios_alimentacion)) !== null) {
            return $model;
        }
    
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
