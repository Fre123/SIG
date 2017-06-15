<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "proyecto".
 *
 * @property integer $ID_PROYECTO
 * @property string $NOMBRE_PROYECTO
 * @property string $ESTADO_CUMPLIMIENTO_PROYECTO
 * @property string $FECHA_INICIO_PROYECTO
 * @property string $FECHA_FIN_PROYECTO
 * @property string $PORCENTAJE_EJECUCION_PROYECTO
 *
 * @property DocenteProyecto[] $docenteProyectos
 * @property Docentes[] $iDDOCENTESs
 * @property EstudianteProyecto[] $estudianteProyectos
 * @property Estudiante[] $iDESTUDIANTEs
 * @property Lugar[] $lugars
 * @property Posee[] $posees
 * @property Escuela[] $iDESCUELAs
 */
class Proyecto extends \yii\db\ActiveRecord
{
    PUBLIC $ESCUELAS ;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PROYECTO'], 'required'],
            [['ID_PROYECTO'], 'integer'],
            [['FECHA_INICIO_PROYECTO', 'FECHA_FIN_PROYECTO'], 'safe'],
            [['PORCENTAJE_EJECUCION_PROYECTO'], 'number'],
            [['NOMBRE_PROYECTO'], 'string', 'max' => 100],
            [['ESTADO_CUMPLIMIENTO_PROYECTO'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PROYECTO' => 'Id  Proyecto',
            'NOMBRE_PROYECTO' => 'Nombre  Proyecto',
            'ESTADO_CUMPLIMIENTO_PROYECTO' => 'Estado  Cumplimiento  Proyecto',
            'FECHA_INICIO_PROYECTO' => 'Fecha  Inicio  Proyecto',
            'FECHA_FIN_PROYECTO' => 'Fecha  Fin  Proyecto',
            'PORCENTAJE_EJECUCION_PROYECTO' => 'Porcentaje  Ejecucion  Proyecto',
            'ESCUELAS' => 'Escuelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocenteProyectos()
    {
        return $this->hasMany(DocenteProyecto::className(), ['ID_PROYECTO' => 'ID_PROYECTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDDOCENTESs()
    {
        return $this->hasMany(Docentes::className(), ['ID_DOCENTES' => 'ID_DOCENTES'])->viaTable('docente_proyecto', ['ID_PROYECTO' => 'ID_PROYECTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteProyectos()
    {
        return $this->hasMany(EstudianteProyecto::className(), ['ID_PROYECTO' => 'ID_PROYECTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTUDIANTEs()
    {
        return $this->hasMany(Estudiante::className(), ['ID_ESTUDIANTE' => 'ID_ESTUDIANTE'])->viaTable('estudiante_proyecto', ['ID_PROYECTO' => 'ID_PROYECTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugars()
    {
        return $this->hasMany(Lugar::className(), ['ID_PROYECTO' => 'ID_PROYECTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosees()
    {
        return $this->hasMany(Posee::className(), ['ID_PROYECTO' => 'ID_PROYECTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESCUELAs()
    {
        return $this->hasMany(Escuela::className(), ['ID_ESCUELA' => 'ID_ESCUELA'])->viaTable('posee', ['ID_PROYECTO' => 'ID_PROYECTO']);
    }
}
