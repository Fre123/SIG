<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "diagnostico".
 *
 * @property integer $ID_DIAGNOSTICO
 * @property string $DESCRIPCION_DIAGNOSTICO
 *
 * @property LugarEnfermedad[] $lugarEnfermedads
 * @property ResponsableDiagnostico[] $responsableDiagnosticos
 */
class Diagnostico extends \yii\db\ActiveRecord
{
    public $NOMBRE_RESPONSABLE;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnostico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['ID_DIAGNOSTICO'], 'required'],
            [['NOMBRE_RESPONSABLE'], 'required'],
            [['ID_DIAGNOSTICO'], 'integer'],
            [['DESCRIPCION_DIAGNOSTICO'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DIAGNOSTICO' => 'Id  Diagnostico',
            'DESCRIPCION_DIAGNOSTICO' => 'Descripcion  Diagnostico',
            'NOMBRE_RESPONSABLE' => 'Nombre Responsable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugarEnfermedads()
    {
        return $this->hasMany(LugarEnfermedad::className(), ['ID_DIAGNOSTICO' => 'ID_DIAGNOSTICO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsableDiagnosticos()
    {
        return $this->hasMany(ResponsableDiagnostico::className(), ['ID_DIAGNOSTICO' => 'ID_DIAGNOSTICO']);
    }
}
