<?php

namespace elitedivision\amos\eventi\models\base;

use Yii;

/**
* This is the base-model class for table "tipo_evento".
*
    * @property integer $id
    * @property string $denominazione
    * @property string $colore
    * @property string $created_at
    * @property string $updated_at
    * @property string $deleted_at
    * @property integer $created_by
    * @property integer $updated_by
    * @property integer $deleted_by
    *
            * @property \elitedivision\amos\eventi\models\EventiTipoEventoMm[] $eventiTipoEventoMms
    */
class TipoEvento extends \elitedivision\amos\core\record\Record
{


/**
* @inheritdoc
*/
public static function tableName()
{
return 'tipo_evento';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['denominazione', 'colore'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['denominazione', 'colore'], 'string', 'max' => 255],
];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'denominazione' => 'Denominazione',
    'colore' => 'Colore',
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
    public function getEventiTipoEventoMms()
    {
    return $this->hasMany(\elitedivision\amos\eventi\models\EventiTipoEventoMm::className(), ['tipo_evento_id' => 'id'])->inverseOf('tipoEvento');
    }
}
