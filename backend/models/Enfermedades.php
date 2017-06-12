<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "enfermedades".
 *
 * @property integer $ID_ENFERMEDAD
 * @property string $NOMBRE_ENFERMEDAD
 *
 * @property LugarEnfermedad[] $lugarEnfermedads
 */
class Enfermedades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enfermedades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ENFERMEDAD'], 'required'],
            [['ID_ENFERMEDAD'], 'integer'],
            [['NOMBRE_ENFERMEDAD'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ENFERMEDAD' => 'Id  Enfermedad',
            'NOMBRE_ENFERMEDAD' => 'Nombre  Enfermedad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugarEnfermedads()
    {
        return $this->hasMany(LugarEnfermedad::className(), ['ID_ENFERMEDAD' => 'ID_ENFERMEDAD']);
    }
}
