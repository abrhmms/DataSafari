<?php

namespace frontend\controllers;

use common\models\Alimentacion;
use common\models\AlimentacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlimentacionController implements the CRUD actions for Alimentacion model.
 */
class AlimentacionController extends Controller
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
     * Lists all Alimentacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlimentacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alimentacion model.
     * @param int $id_alimentacion Id Alimentacion
     * @param int $id_animal Id Animal
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_alimentacion, $id_animal)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_alimentacion, $id_animal),
        ]);
    }

    /**
     * Creates a new Alimentacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Alimentacion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_alimentacion' => $model->id_alimentacion, 'id_animal' => $model->id_animal]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alimentacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_alimentacion Id Alimentacion
     * @param int $id_animal Id Animal
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_alimentacion, $id_animal)
    {
        $model = $this->findModel($id_alimentacion, $id_animal);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_alimentacion' => $model->id_alimentacion, 'id_animal' => $model->id_animal]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alimentacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_alimentacion Id Alimentacion
     * @param int $id_animal Id Animal
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_alimentacion, $id_animal)
    {
        $this->findModel($id_alimentacion, $id_animal)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alimentacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_alimentacion Id Alimentacion
     * @param int $id_animal Id Animal
     * @return Alimentacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_alimentacion, $id_animal)
    {
        if (($model = Alimentacion::findOne(['id_alimentacion' => $id_alimentacion, 'id_animal' => $id_animal])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
