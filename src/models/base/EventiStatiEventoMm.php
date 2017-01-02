<?php

namespace backend\models\base;

use Yii;

/**
* This is the base-model class for table "eventi_stati_evento_mm".
*
    * @property integer $id
    * @property integer $eventi_id
    * @property integer $stati_evento_id
    * @property string $created_at
    * @property string $updated_at
    * @property string $deleted_at
    * @property integer $created_by
    * @property integer $updated_by
    * @property integer $deleted_by
    *
            * @property \elitedivision\amos\eventi\models\Eventi $eventi
            * @property \backend\models\StatiEvento $statiEvento
    */
class EventiStatiEventoMm extends \elitedivision\amos\core\record\Record
{


/**
* @inheritdoc
*/
public static function tableName()
{
return 'eventi_stati_evento_mm';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['eventi_id', 'stati_evento_id'], 'required'],
            [['eventi_id', 'stati_evento_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['eventi_id'], 'exist', 'skipOnError' => true, 'targetClass' => elitedivision\amos\eventi\Eventi::className(), 'targetAttribute' => ['eventi_id' => 'id']],
            [['stati_evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => elitedivision\amos\eventi\StatiEvento::className(), 'targetAttribute' => ['stati_evento_id' => 'id']],
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
    'stati_evento_id' => 'Stati Evento ID',
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
    return $this->hasOne(\elitedivision\amos\eventi\models\Eventi::className(), ['id' => 'eventi_id'])->inverseOf('eventiStatiEventoMms');
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getStatiEvento()
    {
    return $this->hasOne(\elitedivision\amos\eventi\models\StatiEvento::className(), ['id' => 'stati_evento_id'])->inverseOf('eventiStatiEventoMms');
    }
}
