<?php

namespace elitedivision\amos\eventi\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use elitedivision\amos\eventi\models\TipoEvento;

/**
* TipoEventoSearch represents the model behind the search form about `elitedivision\amos\eventi\models\TipoEvento`.
*/
class TipoEventoSearch extends TipoEvento
{
public function rules()
{
return [
[['id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['denominazione', 'colore', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
];
}

public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

public function search($params)
{
$query = TipoEvento::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);



$dataProvider->setSort([
'attributes' => [
    'denominazione' => [
    'asc' => ['tipo_evento.denominazione' => SORT_ASC],
    'desc' => ['tipo_evento.denominazione' => SORT_DESC],
    ],
    'colore' => [
    'asc' => ['tipo_evento.colore' => SORT_ASC],
    'desc' => ['tipo_evento.colore' => SORT_DESC],
    ],
]]);

if (!($this->load($params) && $this->validate())) {
return $dataProvider;
}



$query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ]);

        $query->andFilterWhere(['like', 'denominazione', $this->denominazione])
            ->andFilterWhere(['like', 'colore', $this->colore]);

return $dataProvider;
}
}
