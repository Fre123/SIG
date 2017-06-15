<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "estudiante_proyecto".
 *
 * @property integer $ID_PROYECTO
 * @property integer $ID_ESTUDIANTE
 * @property string $FECHA_REGISTRO
 * @property integer $HORAS
 *
 * @property Proyecto $iDPROYECTO
 * @property Estudiante $iDESTUDIANTE
 */
class EstudianteProyecto extends \yii\db\ActiveRecord
{
    public $TIPO;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiante_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PROYECTO', 'ID_ESTUDIANTE'], 'required'],
            [['ID_PROYECTO', 'ID_ESTUDIANTE', 'HORAS'], 'integer'],
            [['FECHA_REGISTRO'], 'safe'],
            [['ID_PROYECTO'], 'exist', 'skipOnError' => true, 'targetClass' => Proyecto::className(), 'targetAttribute' => ['ID_PROYECTO' => 'ID_PROYECTO']],
            [['ID_ESTUDIANTE'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['ID_ESTUDIANTE' => 'ID_ESTUDIANTE']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PROYECTO' => 'Id  Proyecto',
            'ID_ESTUDIANTE' => 'Id  Estudiante',
            'FECHA_REGISTRO' => 'Fecha  Registro',
            'HORAS' => 'Horas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPROYECTO()
    {
        return $this->hasOne(Proyecto::className(), ['ID_PROYECTO' => 'ID_PROYECTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTUDIANTE()
    {
        return $this->hasOne(Estudiante::className(), ['ID_ESTUDIANTE' => 'ID_ESTUDIANTE']);
    }
}
