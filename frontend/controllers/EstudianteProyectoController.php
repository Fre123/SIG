<?php

namespace frontend\controllers;

use Yii;
use frontend\models\EstudianteProyecto;
use frontend\models\EstudianteProyectoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use frontend\models\Estudiante;
use frontend\models\Docentes;
/**
 * EstudianteProyectoController implements the CRUD actions for EstudianteProyecto model.
 */
class EstudianteProyectoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EstudianteProyecto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstudianteProyectoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
     /**
       *  Obtiene el nombre de la zona
       * @return mixed
       */
     public function actionTipo($tipo)
     {
        if ($tipo == 'ESTUDIANTE'){
            
         $estudiante =  Estudiante::find()->all();
         echo "<option></option>";
         foreach ($estudiante  as  $value) {
           echo "<option value='".$value->ID_ESTUDIANTE."'>".$value->NOMBRE_ESTUDIANTE."</option>";
         }
            
        }else{
            
        $docente  = Docentes::find()->all();
        echo "<option></option>";
        foreach ($docente  as  $value) {
           echo "<option value='".$value->ID_DOCENTES."'>".$value->NOMBRE_DOCENTES."</option>";
         }
            
        }

     }

    /**
     * Displays a single EstudianteProyecto model.
     * @param integer $ID_PROYECTO
     * @param integer $ID_ESTUDIANTE
     * @return mixed
     */
    public function actionView($ID_PROYECTO, $ID_ESTUDIANTE)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_PROYECTO, $ID_ESTUDIANTE),
        ]);
    }

    /**
     * Creates a new EstudianteProyecto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EstudianteProyecto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_PROYECTO' => $model->ID_PROYECTO, 'ID_ESTUDIANTE' => $model->ID_ESTUDIANTE]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EstudianteProyecto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID_PROYECTO
     * @param integer $ID_ESTUDIANTE
     * @return mixed
     */
    public function actionUpdate($ID_PROYECTO, $ID_ESTUDIANTE)
    {
        $model = $this->findModel($ID_PROYECTO, $ID_ESTUDIANTE);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_PROYECTO' => $model->ID_PROYECTO, 'ID_ESTUDIANTE' => $model->ID_ESTUDIANTE]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EstudianteProyecto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID_PROYECTO
     * @param integer $ID_ESTUDIANTE
     * @return mixed
     */
    public function actionDelete($ID_PROYECTO, $ID_ESTUDIANTE)
    {
        $this->findModel($ID_PROYECTO, $ID_ESTUDIANTE)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstudianteProyecto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID_PROYECTO
     * @param integer $ID_ESTUDIANTE
     * @return EstudianteProyecto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_PROYECTO, $ID_ESTUDIANTE)
    {
        if (($model = EstudianteProyecto::findOne(['ID_PROYECTO' => $ID_PROYECTO, 'ID_ESTUDIANTE' => $ID_ESTUDIANTE])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
