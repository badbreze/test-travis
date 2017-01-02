<?php

namespace elitedivision\amos\eventi\models\base;

use elitedivision\amos\admin\models\UserProfile;
use Yii;

/**
 * This is the base-model class for table "eventi".
 *
 * @property integer $id
 * @property string $titolo
 * @property string $descrizione
 * @property string $data_inizio
 * @property string $data_fine
 * @property string $ora_inizio
 * @property string $ora_fine
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * @property \elitedivision\amos\eventi\models\EventiStatiEventoMm[] $eventiStatiEventoMms
 * @property \elitedivision\amos\eventi\models\EventiTipoEventoMm[] $eventiTipoEventoMms
 * @property \elitedivision\amos\eventi\models\EventiUtenzeMm[] $eventiUtenzeMms
 */
class Eventi extends \elitedivision\amos\core\record\Record
{

    /**
     * @var array Attributo di relazione
     */
    public $attrTipoEventoMm;
    /**
     * @var array Attributo di relazione
     */
    public $attrStatiEventoMm;
    /**
     * @var array Attributo di relazione
     */
    public $attrUtenzeMm;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titolo', 'data_inizio', 'data_fine', 'ora_inizio', 'ora_fine'], 'required'],
            [['descrizione'], 'string'],
            [['data_inizio', 'data_fine', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['ora_inizio', 'ora_fine'], 'number'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['titolo'], 'string', 'max' => 255],

            [['attrTipoEventoMm'], 'safe'],

            [['attrStatiEventoMm'], 'safe'],

            [['attrUtenzeMm'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titolo' => 'Titolo',
            'descrizione' => 'Descrizione',
            'data_inizio' => 'Data inizio',
            'data_fine' => 'Data fine',
            'ora_inizio' => 'Ora inizio',
            'ora_fine' => 'Ora fine',
            'created_at' => 'Creato il',
            'updated_at' => 'Aggiornato il',
            'deleted_at' => 'Cancellato il',
            'created_by' => 'Creato da',
            'updated_by' => 'Aggiornato da',
            'deleted_by' => 'Cancellato da',

            'tipoEvento' => 'Tipo',
            'attrTipoEventoMm' => 'Tipo',

            'statiEvento' => 'Stato',
            'attrStatiEventoMm' => 'Stato',

            'utenze' => 'Invitati',
            'attrUtenzeMm' => 'Invitati',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventiStatiEventoMms()
    {
        return $this->hasMany(\elitedivision\amos\eventi\models\EventiStatiEventoMm::className(), ['eventi_id' => 'id'])->inverseOf('eventi');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventiTipoEventoMms()
    {
        return $this->hasMany(\elitedivision\amos\eventi\models\EventiTipoEventoMm::className(), ['eventi_id' => 'id'])->inverseOf('eventi');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventiUtenzeMms()
    {
        return $this->hasMany(\elitedivision\amos\eventi\models\EventiUtenzeMm::className(), ['eventi_id' => 'id'])->inverseOf('eventi');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEvento()
    {
        return $this->hasOne(\elitedivision\amos\eventi\models\TipoEvento::className(), ['id' => 'tipo_evento_id'])->via('eventiTipoEventoMms');
    }

    public function getAttrTipoEventoMm()
    {
        $ritorno = "";
        $ritorno .= '' . $this->tipoEvento->denominazione;

        return $ritorno;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatiEvento()
    {
        return $this->hasOne(\elitedivision\amos\eventi\models\StatiEvento::className(), ['id' => 'stati_evento_id'])->via('eventiStatiEventoMms');
    }

    public function getAttrStatiEventoMm()
    {
        $ritorno = "";
        $ritorno .= '' . $this->statiEvento->nome;

        return $ritorno;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtenze()
    {
        return $this->hasMany(UserProfile::className(), ['id' => 'utenti_id'])->via('eventiUtenzeMms');
    }

    public function getAttrUtenzeMm($separator = ' ')
    {
        $ritorno = "";
        $ind = 0;
        foreach ((array)$this->utenze as $str) {
            $ritorno .= (($ind == 0) ? '' : ', ') . $str['nome'];
            $ind++;
        }
        return $ritorno;
    }


}
