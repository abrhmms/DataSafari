<?php

namespace frontend\controllers;

use common\models\Habitat;
use common\models\HabitatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HabitatController implements the CRUD actions for Habitat model.
 */
class HabitatController extends Controller
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
     * Lists all Habitat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HabitatSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Habitat model.
     * @param int $id_habitat Id Habitat
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_habitat)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_habitat),
        ]);
    }

    /**
     * Creates a new Habitat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Habitat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_habitat' => $model->id_habitat]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Habitat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_habitat Id Habitat
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_habitat)
    {
        $model = $this->findModel($id_habitat);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_habitat' => $model->id_habitat]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Habitat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_habitat Id Habitat
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_habitat)
    {
        $this->findModel($id_habitat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Habitat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_habitat Id Habitat
     * @return Habitat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_habitat)
    {
        if (($model = Habitat::findOne(['id_habitat' => $id_habitat])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
