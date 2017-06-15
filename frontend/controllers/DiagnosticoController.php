<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Diagnostico;
use frontend\models\LugarEnfermedad;
use frontend\models\ResponsableDiagnostico;
use frontend\models\DiagnosticoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\Model;

/**
 * DiagnosticoController implements the CRUD actions for Diagnostico model.
 */
class DiagnosticoController extends Controller
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
     * Lists all Diagnostico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiagnosticoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diagnostico model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Diagnostico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diagnostico();
        $modelDiagnostico =new ResponsableDiagnostico;
        $modelLugarEnfermedad = [new LugarEnfermedad];
        
        $idDiagnostico= Diagnostico::find()->max('ID_DIAGNOSTICO');
        
        $model->ID_DIAGNOSTICO = ($idDiagnostico+1);
        
        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
       
            /*nombre de responsables*/
            $id = $model->ID_DIAGNOSTICO ;
            foreach ($model->NOMBRE_RESPONSABLE as $value) {
                
                Yii::$app->db->createCommand()
                    ->insert('responsable_diagnostico', [
                    'NOMBRE_RESPONSABLE' => $value,
                    'ID_DIAGNOSTICO' => $id,
                    ])->execute();
            }
            /*nombre de responsables*/
            
            $modelLugarEnfermedad = Model::createMultiple(LugarEnfermedad::classname());
            
            Model::loadMultiple($modelLugarEnfermedad, Yii::$app->request->post());
            
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelLugarEnfermedad as $modelLugarEnfermedad) {
                            $modelLugarEnfermedad->ID_DIAGNOSTICO = $model->ID_DIAGNOSTICO;
                            if (!($flag = $modelLugarEnfermedad->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->ID_DIAGNOSTICO]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelDiagnostico' => $modelDiagnostico,
                'modelLugarEnfermedad' => $modelLugarEnfermedad
               
            ]);
        }
    }

    /**
     * Updates an existing Diagnostico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
  
        $modelLugarEnfermedad = LugarEnfermedad::findAll(['ID_DIAGNOSTICO'=>$id]);;
        
        $modelDiagnostico = ResponsableDiagnostico::findAll(['ID_DIAGNOSTICO'=>$id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            

            
           /*ACTUALIZACION DEL RESPONSABLE*/
           $ID_RESPONSABLE[]= 0;
           
           foreach ($modelDiagnostico as $i => $value) {
               
               $ID_RESPONSABLE[$i] = $value->ID_RESPONSABLE;
           }
           $con = 0;
            foreach ($model->NOMBRE_RESPONSABLE as $value) {
             
                    Yii::$app->db->createCommand()
                         ->update('responsable_diagnostico', ['NOMBRE_RESPONSABLE' => $value ], ['ID_RESPONSABLE' =>$ID_RESPONSABLE[$con]])
                         ->execute(); 
           $con++;
           }
           /*ACTUALIZACION DEL RESPONSABLE*/
           $ID_LUGAR_ENFERMEDAD [] = 0;
           foreach ($modelLugarEnfermedad as $i => $value) {
               
               $ID_LUGAR_ENFERMEDAD[$i] = $value->ID_LUGAR_ENFERMEDAD;
           }
           
           Model::loadMultiple($modelLugarEnfermedad, Yii::$app->request->post());
           
           $con = 0;
           foreach ($modelLugarEnfermedad as $value) {
                
                Yii::$app->db->createCommand()
                         ->update('lugar_enfermedad', 
                         ['ID_ENFERMEDAD'=> $value->ID_ENFERMEDAD,
                          'ID_DIAGNOSTICO'=> $value->ID_DIAGNOSTICO,
                          'NOMBRE_PACIENTE'=> $value->NOMBRE_PACIENTE,
                          'LATITUD_ENFERMEDAD' => $value->LATITUD_ENFERMEDAD,
                          'LONGITUD_ENFERMEDAD' => $value->LONGITUD_ENFERMEDAD], ['ID_LUGAR_ENFERMEDAD' =>$ID_LUGAR_ENFERMEDAD[$con]])
                         ->execute(); 
              
                
            $con++;
           }
           
            return $this->redirect(['view', 'id' => $model->ID_DIAGNOSTICO]);
        } else {
            
            
            return $this->render('update', [
                'model' => $model,
                'modelDiagnostico' => $modelDiagnostico,
                'modelLugarEnfermedad' => $modelLugarEnfermedad
            ]);
        }
    }

    /**
     * Deletes an existing Diagnostico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
        $modelDiagnosticoResponsable = ResponsableDiagnostico::find()->where(['ID_DIAGNOSTICO' => $id])->all();
        $oldIDs = ArrayHelper::map($modelDiagnosticoResponsable, 'ID_DIAGNOSTICO', 'ID_DIAGNOSTICO');
        ResponsableDiagnostico::deleteAll(['ID_DIAGNOSTICO' => $oldIDs]);
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Diagnostico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diagnostico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diagnostico::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
