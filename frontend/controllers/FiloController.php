<?php

namespace frontend\controllers;

use common\models\Filo;
use common\models\FiloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FiloController implements the CRUD actions for Filo model.
 */
class FiloController extends Controller
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
     * Lists all Filo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FiloSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Filo model.
     * @param int $id_filo Id Filo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_filo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_filo),
        ]);
    }

    /**
     * Creates a new Filo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Filo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_filo' => $model->id_filo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Filo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_filo Id Filo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_filo)
    {
        $model = $this->findModel($id_filo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_filo' => $model->id_filo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Filo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_filo Id Filo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_filo)
    {
        $this->findModel($id_filo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Filo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_filo Id Filo
     * @return Filo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_filo)
    {
        if (($model = Filo::findOne(['id_filo' => $id_filo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
