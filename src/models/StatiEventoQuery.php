<?php

namespace elitedivision\amos\eventi\models;

use backend\modules\cwh\query\CwhActiveQuery;
use creocoder\taggable\TaggableQueryBehavior;
use yii\helpers\ArrayHelper;


/**
 * Class StatieventoQuery
 * @package elitedivision\amos\eventi\models * File generato automaticamente, verificarne
 * il contenuto prima di utilizzarlo in produzione
 */
class StatieventoQuery extends CwhActiveQuery
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
    return $this->innerJoin('statievento_stato', 'statievento.statievento_stato_id = statievento_stato.id AND statievento_stato.nome = :stato_nome', [
            ':stato_nome' => 'Attiva'
        ]);
    }
}