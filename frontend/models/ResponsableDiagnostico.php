<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "responsable_diagnostico".
 *
 * @property integer $ID_RESPONSABLE
 * @property integer $ID_DIAGNOSTICO
 * @property string $NOMBRE_RESPONSABLE
 *
 * @property Diagnostico $iDDIAGNOSTICO
 */
class ResponsableDiagnostico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsable_diagnostico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [[ 'ID_DIAGNOSTICO'], 'integer'],
            [['NOMBRE_RESPONSABLE'], 'string', 'max' => 200],
            [['ID_DIAGNOSTICO'], 'exist', 'skipOnError' => true, 'targetClass' => Diagnostico::className(), 'targetAttribute' => ['ID_DIAGNOSTICO' => 'ID_DIAGNOSTICO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'ID_DIAGNOSTICO' => 'Id  Diagnostico',
            'NOMBRE_RESPONSABLE' => 'Nombre  Responsable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDDIAGNOSTICO()
    {
        return $this->hasOne(Diagnostico::className(), ['ID_DIAGNOSTICO' => 'ID_DIAGNOSTICO']);
    }
}
