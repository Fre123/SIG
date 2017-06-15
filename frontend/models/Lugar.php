<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lugar".
 *
 * @property integer $ID_LUGAR
 * @property integer $ID_PROYECTO
 * @property string $LATITUD_LUGAR
 * @property string $LONGITUD_LUGAR
 *
 * @property Proyecto $iDPROYECTO
 */
class Lugar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lugar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_LUGAR'], 'required'],
            [['ID_LUGAR', 'ID_PROYECTO'], 'integer'],
            [['LATITUD_LUGAR', 'LONGITUD_LUGAR'], 'string', 'max' => 30],
            [['ID_PROYECTO'], 'exist', 'skipOnError' => true, 'targetClass' => Proyecto::className(), 'targetAttribute' => ['ID_PROYECTO' => 'ID_PROYECTO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_LUGAR' => 'Id  Lugar',
            'ID_PROYECTO' => 'Id  Proyecto',
            'LATITUD_LUGAR' => 'Latitud  Lugar',
            'LONGITUD_LUGAR' => 'Longitud  Lugar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPROYECTO()
    {
        return $this->hasOne(Proyecto::className(), ['ID_PROYECTO' => 'ID_PROYECTO']);
    }
}
