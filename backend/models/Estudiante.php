<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property integer $ID_ESTUDIANTE
 * @property integer $ID_ESCUELA
 * @property string $NOMBRE_ESTUDIANTE
 * @property string $CEDULA_ESTUDIANTE
 * @property string $MATRICULA_ESTUDIANTE
 * @property string $SEXO
 *
 * @property Escuela $iDESCUELA
 * @property EstudianteProyecto[] $estudianteProyectos
 * @property Proyecto[] $iDPROYECTOs
 * @property Visita[] $visitas
 * @property LugarEnfermedad[] $iDLUGARENFERMEDADs
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTUDIANTE', 'SEXO'], 'required'],
            [['ID_ESTUDIANTE', 'ID_ESCUELA'], 'integer'],
            [['NOMBRE_ESTUDIANTE'], 'string', 'max' => 80],
            [['CEDULA_ESTUDIANTE'], 'string', 'max' => 20],
            [['MATRICULA_ESTUDIANTE', 'SEXO'], 'string', 'max' => 10],
            [['ID_ESCUELA'], 'exist', 'skipOnError' => true, 'targetClass' => Escuela::className(), 'targetAttribute' => ['ID_ESCUELA' => 'ID_ESCUELA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTUDIANTE' => 'Id  Estudiante',
            'ID_ESCUELA' => 'Id  Escuela',
            'NOMBRE_ESTUDIANTE' => 'Nombre  Estudiante',
            'CEDULA_ESTUDIANTE' => 'Cedula  Estudiante',
            'MATRICULA_ESTUDIANTE' => 'Matricula  Estudiante',
            'SEXO' => 'Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESCUELA()
    {
        return $this->hasOne(Escuela::className(), ['ID_ESCUELA' => 'ID_ESCUELA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteProyectos()
    {
        return $this->hasMany(EstudianteProyecto::className(), ['ID_ESTUDIANTE' => 'ID_ESTUDIANTE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPROYECTOs()
    {
        return $this->hasMany(Proyecto::className(), ['ID_PROYECTO' => 'ID_PROYECTO'])->viaTable('estudiante_proyecto', ['ID_ESTUDIANTE' => 'ID_ESTUDIANTE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitas()
    {
        return $this->hasMany(Visita::className(), ['ID_ESTUDIANTE' => 'ID_ESTUDIANTE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDLUGARENFERMEDADs()
    {
        return $this->hasMany(LugarEnfermedad::className(), ['ID_LUGAR_ENFERMEDAD' => 'ID_LUGAR_ENFERMEDAD'])->viaTable('visita', ['ID_ESTUDIANTE' => 'ID_ESTUDIANTE']);
    }
}
