<?php

namespace backend\models\base;

use Yii;

/**
* This is the base-model class for table "eventi_tipo_evento_mm".
*
    * @property integer $id
    * @property integer $eventi_id
    * @property integer $tipo_evento_id
    * @property string $created_at
    * @property string $updated_at
    * @property string $deleted_at
    * @property integer $created_by
    * @property integer $updated_by
    * @property integer $deleted_by
    *
            * @property \elitedivision\amos\eventi\models\Eventi $eventi
            * @property \backend\models\TipoEvento $tipoEvento
    */
class EventiTipoEventoMm extends \elitedivision\amos\core\record\Record
{


/**
* @inheritdoc
*/
public static function tableName()
{
return 'eventi_tipo_evento_mm';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['eventi_id', 'tipo_evento_id'], 'required'],
            [['eventi_id', 'tipo_evento_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['eventi_id'], 'exist', 'skipOnError' => true, 'targetClass' => elitedivision\amos\eventi\Eventi::className(), 'targetAttribute' => ['eventi_id' => 'id']],
            [['tipo_evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => elitedivision\amos\eventi\TipoEvento::className(), 'targetAttribute' => ['tipo_evento_id' => 'id']],
];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'eventi_id' => 'Eventi ID',
    'tipo_evento_id' => 'Tipo Evento ID',
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
    public function getEventi()
    {
    return $this->hasOne(\elitedivision\amos\eventi\models\Eventi::className(), ['id' => 'eventi_id'])->inverseOf('eventiTipoEventoMms');
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getTipoEvento()
    {
    return $this->hasOne(\elitedivision\amos\eventi\models\TipoEvento::className(), ['id' => 'tipo_evento_id'])->inverseOf('eventiTipoEventoMms');
    }
}
