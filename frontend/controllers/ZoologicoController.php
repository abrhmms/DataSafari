<?php

namespace frontend\controllers;

use common\models\Zoologico;
use common\models\ZoologicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ZoologicoController implements the CRUD actions for Zoologico model.
 */
class ZoologicoController extends Controller
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
     * Lists all Zoologico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ZoologicoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Zoologico model.
     * @param int $id_zoologico Id Zoologico
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_zoologico)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_zoologico),
        ]);
    }

    /**
     * Creates a new Zoologico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Zoologico();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_zoologico' => $model->id_zoologico]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Zoologico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_zoologico Id Zoologico
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_zoologico)
    {
        $model = $this->findModel($id_zoologico);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_zoologico' => $model->id_zoologico]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Zoologico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_zoologico Id Zoologico
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_zoologico)
    {
        $this->findModel($id_zoologico)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Zoologico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_zoologico Id Zoologico
     * @return Zoologico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_zoologico)
    {
        if (($model = Zoologico::findOne(['id_zoologico' => $id_zoologico])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
