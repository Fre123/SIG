<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "escuela".
 *
 * @property integer $ID_ESCUELA
 * @property string $NOMBRE_ESCUELA
 *
 * @property Docentes[] $docentes
 * @property Estudiante[] $estudiantes
 * @property Proyecto[] $proyectos
 */
class Escuela extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'escuela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESCUELA'], 'required'],
            [['ID_ESCUELA'], 'integer'],
            [['NOMBRE_ESCUELA'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESCUELA' => 'Id  Escuela',
            'NOMBRE_ESCUELA' => 'Nombre  Escuela',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docentes::className(), ['ID_ESCUELA' => 'ID_ESCUELA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['ID_ESCUELA' => 'ID_ESCUELA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyecto::className(), ['ID_ESCUELA' => 'ID_ESCUELA']);
    }
}
