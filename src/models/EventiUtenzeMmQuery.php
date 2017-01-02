<?php

namespace backend\models;

use backend\modules\cwh\query\CwhActiveQuery;
use creocoder\taggable\TaggableQueryBehavior;
use yii\helpers\ArrayHelper;


/**
 * Class EventiutenzemmQuery
 * @package backend\models * File generato automaticamente, verificarne
 * il contenuto prima di utilizzarlo in produzione
 */
class EventiutenzemmQuery extends CwhActiveQuery
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
    return $this->innerJoin('eventiutenzemm_stato', 'eventiutenzemm.eventiutenzemm_stato_id = eventiutenzemm_stato.id AND eventiutenzemm_stato.nome = :stato_nome', [
            ':stato_nome' => 'Attiva'
        ]);
    }
}