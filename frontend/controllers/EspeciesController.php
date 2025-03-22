<?php

namespace frontend\controllers;

use common\models\Especies;
use common\models\EspeciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EspeciesController implements the CRUD actions for Especies model.
 */
class EspeciesController extends Controller
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
     * Lists all Especies models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EspeciesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Especies model.
     * @param int $id_especies Id Especies
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_especies)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_especies),
        ]);
    }

    /**
     * Creates a new Especies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Especies();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_especies' => $model->id_especies]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Especies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_especies Id Especies
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_especies)
    {
        $model = $this->findModel($id_especies);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_especies' => $model->id_especies]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Especies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_especies Id Especies
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_especies)
    {
        $this->findModel($id_especies)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Especies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_especies Id Especies
     * @return Especies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_especies)
    {
        if (($model = Especies::findOne(['id_especies' => $id_especies])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
