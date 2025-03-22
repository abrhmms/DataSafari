<?php

namespace frontend\controllers;

use common\models\Animal;
use common\models\AnimalSearch;
use common\models\Clase;
use common\models\Especies;
use common\models\Familia;
use common\models\Genero;
use common\models\Orden;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;

/**
 * AnimalController implements the CRUD actions for Animal model.
 */
class AnimalController extends Controller
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
     * Lists all Animal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AnimalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Animal model.
     * @param int $id_animal Id Animal
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_animal)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_animal),
        ]);
    }

    /**
     * Creates a new Animal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Animal();
    
        if ($model->load(Yii::$app->request->post())) {
            $imageFile = UploadedFile::getInstance($model, 'imagen_ilustrativa');
        
            if ($imageFile) {
                $imageName = 'img/animales/' . uniqid() . '.' . $imageFile->extension;
                $imageFile->saveAs($imageName);
                $model->imagen_ilustrativa = $imageName; 
            } else {
                $model->imagen_ilustrativa = 'img/default.png'; // Imagen por defecto
            }
        
            $model->punto_id = Yii::$app->request->post('Animal')['punto_id']; // Asignar punto_id
        
    
            // Obtener jerarquía de la especie
            $especie = Especies::findOne($model->id_especies);
            if ($especie) {
                $model->id_genero = $especie->id_genero;
                $model->id_familia = $especie->genero->id_familia;
                $model->id_orden = $especie->genero->familia->id_orden;
                $model->id_clase = $especie->genero->familia->orden->id_clase;
                $model->id_filo = $especie->genero->familia->orden->clase->id_filo;
            } else {
                Yii::$app->session->setFlash('error', 'Error: La especie seleccionada no existe.');
                return $this->redirect(['create']);
            }
    
            if ($model->save()) {
                return $this->redirect(['view', 'id_animal' => $model->id_animal]);
            } else {
                Yii::$app->session->setFlash('error', 'No se pudo guardar el animal. Errores: ' . json_encode($model->errors));
            }
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    

    /**
     * Updates an existing Animal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_animal Id Animal
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_animal)
    {
        $model = $this->findModel($id_animal);
        $imagenAnterior = $model->imagen_ilustrativa; // Guardamos la imagen actual
    
        if ($model->load(Yii::$app->request->post())) {
            // Manejo de imagen
            $imageFile = UploadedFile::getInstance($model, 'imagen_ilustrativa');
            if ($imageFile) {
                $imageName = 'img/animales/' . uniqid() . '.' . $imageFile->extension;
                $imageFile->saveAs($imageName);
                $model->imagen_ilustrativa = $imageName;
            } else {
                $model->imagen_ilustrativa = $imagenAnterior; // Mantiene la imagen anterior si no se cambia
            }
    
            // Verificar que la especie exista y actualizar la taxonomía
            $especie = Especies::findOne($model->id_especies);
            if ($especie) {
                $model->id_genero = $especie->id_genero;
                $model->id_familia = $especie->genero->id_familia;
                $model->id_orden = $especie->genero->familia->id_orden;
                $model->id_clase = $especie->genero->familia->orden->id_clase;
                $model->id_filo = $especie->genero->familia->orden->clase->id_filo;
            } else {
                Yii::$app->session->setFlash('error', 'Error: La especie seleccionada no existe.');
                return $this->redirect(['update', 'id_animal' => $model->id_animal]);
            }

            if ($model->load(Yii::$app->request->post())) {
                $model->punto_id = Yii::$app->request->post('Animal')['punto_id'];
            }            
    
            if ($model->save()) {
                return $this->redirect(['view', 'id_animal' => $model->id_animal]);
            } else {
                Yii::$app->session->setFlash('error', 'No se pudo actualizar el animal. Errores: ' . json_encode($model->errors));
            }
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    

    /**
     * Deletes an existing Animal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_animal Id Animal
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_animal)
    {
        $this->findModel($id_animal)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Animal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_animal Id Animal
     * @return Animal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_animal)
    {
        if (($model = Animal::findOne(['id_animal' => $id_animal])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionOptionsClase(){
        $data = $this->request->post();
        $clases = Clase::findAll($data['id_filo']);
        //print_r($clase);die();
        return $this->asJson($clases);
    }

    public function actionOptionsOrden()
    {
        $data = $this->request->post();
        $ordenes = Orden::find()->where(['id_clase' => $data['id_clase']])->all();
        return $this->asJson($ordenes);
    }
    
    public function actionOptionsFamilia()
    {
        $data = $this->request->post();
        $familias = Familia::find()->where(['id_orden' => $data['id_orden']])->all();
        return $this->asJson($familias);
    }
    
    public function actionOptionsGenero()
    {
        $data = $this->request->post();
        $generos = Genero::find()->where(['id_familia' => $data['id_familia']])->all();
        return $this->asJson($generos);
    }
    
    public function actionOptionsEspecies()
    {
        $data = $this->request->post();
        $especies = Especies::find()->where(['id_genero' => $data['id_genero']])->all();
        return $this->asJson($especies);
    }
    
    public function actionAnimalesPorZona() {
        $punto_id = Yii::$app->request->get('punto_id');
    
        if ($punto_id === null) {
            return $this->asJson(['error' => 'punto_id es requerido']);
        }
    
        // Obtener los animales para ese punto_id
        $animales = Animal::find()->where(['punto_id' => $punto_id])->all();
    
        // Renderizar la vista parcial que contiene los animales
        return $this->renderPartial('_lista_animales', ['animales' => $animales]);
    }
    
    
    
    
    
    
    
    
    
    
    
    

    
}
