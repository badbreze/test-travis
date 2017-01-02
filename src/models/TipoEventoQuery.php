<?php

namespace elitedivision\amos\eventi\models;

use backend\modules\cwh\query\CwhActiveQuery;
use creocoder\taggable\TaggableQueryBehavior;
use yii\helpers\ArrayHelper;


/**
 * Class TipoeventoQuery
 * @package elitedivision\amos\eventi\models * File generato automaticamente, verificarne
 * il contenuto prima di utilizzarlo in produzione
 */
class TipoeventoQuery extends CwhActiveQuery
{
    /**
     * @return array
     * da scommentare se si utilizzano i tag
     */
    //public function behaviors()
    //{
    //    return ArrayHelper::merge(
    //        parent::behaviors(), [
    //            TaggableQueryBehavior::className()
    //        ]
    //    );   
    //}

    /**
     * @return \yii\db\ActiveQuery     
     */
    public function attive()
    {
    //Questo è solo un esempio, verificare che i campi e le tabelle siano corretti
    return $this->innerJoin('tipoevento_stato', 'tipoevento.tipoevento_stato_id = tipoevento_stato.id AND tipoevento_stato.nome = :stato_nome', [
            ':stato_nome' => 'Attiva'
        ]);
    }
}