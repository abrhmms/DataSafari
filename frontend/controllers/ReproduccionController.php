<?php

namespace frontend\controllers;

use common\models\Reproduccion;
use common\models\ReproduccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReproduccionController implements the CRUD actions for Reproduccion model.
 */
class ReproduccionController extends Controller
{

    public $layout = '@frontend/views/veterinario/layouts/main'; // FORZAR EL LAYOUT CORRECTO

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
     * Lists all Reproduccion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ReproduccionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reproduccion model.
     * @param int $id_reproduccion Id Reproduccion
     * @param int $id_animal_madre Id Animal Madre
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_reproduccion, $id_animal_madre)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_reproduccion, $id_animal_madre),
        ]);
    }

    /**
     * Creates a new Reproduccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Reproduccion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_reproduccion' => $model->id_reproduccion, 'id_animal_madre' => $model->id_animal_madre]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reproduccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_reproduccion Id Reproduccion
     * @param int $id_animal_madre Id Animal Madre
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_reproduccion, $id_animal_madre)
    {
        $model = $this->findModel($id_reproduccion, $id_animal_madre);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_reproduccion' => $model->id_reproduccion, 'id_animal_madre' => $model->id_animal_madre]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reproduccion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_reproduccion Id Reproduccion
     * @param int $id_animal_madre Id Animal Madre
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_reproduccion, $id_animal_madre)
    {
        $this->findModel($id_reproduccion, $id_animal_madre)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reproduccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_reproduccion Id Reproduccion
     * @param int $id_animal_madre Id Animal Madre
     * @return Reproduccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_reproduccion, $id_animal_madre)
    {
        if (($model = Reproduccion::findOne(['id_reproduccion' => $id_reproduccion, 'id_animal_madre' => $id_animal_madre])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
