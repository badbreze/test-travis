<?php

namespace backend\models;

use backend\modules\cwh\query\CwhActiveQuery;
use creocoder\taggable\TaggableQueryBehavior;
use yii\helpers\ArrayHelper;


/**
 * Class EventitipoeventommQuery
 * @package backend\models * File generato automaticamente, verificarne
 * il contenuto prima di utilizzarlo in produzione
 */
class EventitipoeventommQuery extends CwhActiveQuery
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
    return $this->innerJoin('eventitipoeventomm_stato', 'eventitipoeventomm.eventitipoeventomm_stato_id = eventitipoeventomm_stato.id AND eventitipoeventomm_stato.nome = :stato_nome', [
            ':stato_nome' => 'Attiva'
        ]);
    }
}