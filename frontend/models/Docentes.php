<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "docentes".
 *
 * @property integer $ID_DOCENTES
 * @property integer $ID_ESCUELA
 * @property string $NOMBRE_DOCENTES
 * @property string $CEDULA_DOCENTE
 * @property string $SEXO
 *
 * @property DocenteProyecto[] $docenteProyectos
 * @property Proyecto[] $iDPROYECTOs
 * @property Escuela $iDESCUELA
 */
class Docentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DOCENTES', 'NOMBRE_DOCENTES', 'CEDULA_DOCENTE', 'SEXO'], 'required'],
            [['ID_DOCENTES', 'ID_ESCUELA'], 'integer'],
            [['NOMBRE_DOCENTES', 'CEDULA_DOCENTE'], 'string', 'max' => 200],
            [['SEXO'], 'string', 'max' => 13],
            [['ID_ESCUELA'], 'exist', 'skipOnError' => true, 'targetClass' => Escuela::className(), 'targetAttribute' => ['ID_ESCUELA' => 'ID_ESCUELA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DOCENTES' => 'Id  Docentes',
            'ID_ESCUELA' => 'Id  Escuela',
            'NOMBRE_DOCENTES' => 'Nombre  Docentes',
            'CEDULA_DOCENTE' => 'Cedula  Docente',
            'SEXO' => 'Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocenteProyectos()
    {
        return $this->hasMany(DocenteProyecto::className(), ['ID_DOCENTES' => 'ID_DOCENTES']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPROYECTOs()
    {
        return $this->hasMany(Proyecto::className(), ['ID_PROYECTO' => 'ID_PROYECTO'])->viaTable('docente_proyecto', ['ID_DOCENTES' => 'ID_DOCENTES']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESCUELA()
    {
        return $this->hasOne(Escuela::className(), ['ID_ESCUELA' => 'ID_ESCUELA']);
    }
}
