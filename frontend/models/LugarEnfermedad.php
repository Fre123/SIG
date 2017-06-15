<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lugar_enfermedad".
 *
 * @property integer $ID_LUGAR_ENFERMEDAD
 * @property integer $ID_ENFERMEDAD
 * @property integer $ID_DIAGNOSTICO
 * @property string $NOMBRE_PACIENTE
 * @property string $LATITUD_ENFERMEDAD
 * @property string $LONGITUD_ENFERMEDAD
 *
 * @property Enfermedades $iDENFERMEDAD
 * @property Diagnostico $iDDIAGNOSTICO
 */
class LugarEnfermedad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lugar_enfermedad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ENFERMEDAD', 'ID_DIAGNOSTICO'], 'integer'],
            [['NOMBRE_PACIENTE', 'LATITUD_ENFERMEDAD', 'LONGITUD_ENFERMEDAD'], 'required'],
            [['NOMBRE_PACIENTE'], 'string', 'max' => 150],
            [['LATITUD_ENFERMEDAD', 'LONGITUD_ENFERMEDAD'], 'string', 'max' => 80],
            [['ID_ENFERMEDAD'], 'exist', 'skipOnError' => true, 'targetClass' => Enfermedades::className(), 'targetAttribute' => ['ID_ENFERMEDAD' => 'ID_ENFERMEDAD']],
            [['ID_DIAGNOSTICO'], 'exist', 'skipOnError' => true, 'targetClass' => Diagnostico::className(), 'targetAttribute' => ['ID_DIAGNOSTICO' => 'ID_DIAGNOSTICO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_LUGAR_ENFERMEDAD' => 'Id  Lugar  Enfermedad',
            'ID_ENFERMEDAD' => 'Id  Enfermedad',
            'ID_DIAGNOSTICO' => 'Id  Diagnostico',
            'NOMBRE_PACIENTE' => 'Nombre  Paciente',
            'LATITUD_ENFERMEDAD' => 'Latitud  Enfermedad',
            'LONGITUD_ENFERMEDAD' => 'Longitud  Enfermedad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDENFERMEDAD()
    {
        return $this->hasOne(Enfermedades::className(), ['ID_ENFERMEDAD' => 'ID_ENFERMEDAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDDIAGNOSTICO()
    {
        return $this->hasOne(Diagnostico::className(), ['ID_DIAGNOSTICO' => 'ID_DIAGNOSTICO']);
    }
}
