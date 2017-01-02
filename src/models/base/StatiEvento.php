<?php

namespace elitedivision\amos\eventi\models\base;

use Yii;

/**
* This is the base-model class for table "stati_evento".
*
    * @property integer $id
    * @property string $nome
    * @property string $created_at
    * @property string $updated_at
    * @property string $deleted_at
    * @property integer $created_by
    * @property integer $updated_by
    * @property integer $deleted_by
    *
            * @property \elitedivision\amos\eventi\models\EventiStatiEventoMm[] $eventiStatiEventoMms
    */
class StatiEvento extends \elitedivision\amos\core\record\Record
{


/**
* @inheritdoc
*/
public static function tableName()
{
return 'stati_evento';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['nome'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['nome'], 'string', 'max' => 255],
];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'nome' => 'Nome',
    'created_at' => 'Creato il',
    'updated_at' => 'Aggiornato il',
    'deleted_at' => 'Cancellato il',
    'created_by' => 'Creato da',
    'updated_by' => 'Aggiornato da',
    'deleted_by' => 'Cancellato da',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getEventiStatiEventoMms()
    {
    return $this->hasMany(\elitedivision\amos\eventi\models\EventiStatiEventoMm::className(), ['stati_evento_id' => 'id'])->inverseOf('statiEvento');
    }
}
