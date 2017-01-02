<?php

namespace elitedivision\amos\eventi\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use elitedivision\amos\eventi\models\Eventi;

/**
 * EventiSearch represents the model behind the search form about `elitedivision\amos\eventi\models\Eventi`.
 */
class EventiSearch extends Eventi
{
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['titolo', 'descrizione', 'data_inizio', 'data_fine', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['ora_inizio', 'ora_fine'], 'number'],
            [[
                'data_inizio_from',
                'data_inizio_to',
                'data_fine_from',
                'data_fine_to',
            ], 'safe'],
            ['attrTipoEventoMm', 'safe'],
            ['attrStatiEventoMm', 'safe'],
            ['attrUtenzeMm', 'safe'],
        ];
    }

    public function scenarios()
    {
// bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Eventi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith('tipoEvento');
        $query->joinWith('statiEvento');
        $query->joinWith('user_profile');

        $dataProvider->setSort([
            'attributes' => [
                'titolo' => [
                    'asc' => ['eventi.titolo' => SORT_ASC],
                    'desc' => ['eventi.titolo' => SORT_DESC],
                ],
                'descrizione' => [
                    'asc' => ['eventi.descrizione' => SORT_ASC],
                    'desc' => ['eventi.descrizione' => SORT_DESC],
                ],
                'data_inizio' => [
                    'asc' => ['eventi.data_inizio' => SORT_ASC],
                    'desc' => ['eventi.data_inizio' => SORT_DESC],
                ],
                'data_fine' => [
                    'asc' => ['eventi.data_fine' => SORT_ASC],
                    'desc' => ['eventi.data_fine' => SORT_DESC],
                ],
                'ora_inizio' => [
                    'asc' => ['eventi.ora_inizio' => SORT_ASC],
                    'desc' => ['eventi.ora_inizio' => SORT_DESC],
                ],
                'ora_fine' => [
                    'asc' => ['eventi.ora_fine' => SORT_ASC],
                    'desc' => ['eventi.ora_fine' => SORT_DESC],
                ],
                'tipoEvento' => [
                    'asc' => ['tipo_evento.denominazione' => SORT_ASC],
                    'desc' => ['tipo_evento.denominazione' => SORT_DESC],
                ], 'statiEvento' => [
                    'asc' => ['stati_evento.nome' => SORT_ASC],
                    'desc' => ['stati_evento.nome' => SORT_DESC],
                ], 'user_profile' => [
                    'asc' => ['user_profile.nome' => SORT_ASC],
                    'desc' => ['user_profile.nome' => SORT_DESC],
                ],]]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere([
            'id' => $this->id,
            'data_inizio' => $this->data_inizio,
            'data_fine' => $this->data_fine,
            'ora_inizio' => $this->ora_inizio,
            'ora_fine' => $this->ora_fine,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ]);

        $query->andFilterWhere(['like', 'titolo', $this->titolo])
            ->andFilterWhere(['like', 'descrizione', $this->descrizione]);
        $query->andFilterWhere(['>=', 'data_inizio', $this->data_inizio_from]);
        $query->andFilterWhere(['<=', 'data_inizio', $this->data_inizio_to]);
        $query->andFilterWhere(['>=', 'data_fine', $this->data_fine_from]);
        $query->andFilterWhere(['<=', 'data_fine', $this->data_fine_to]);
        $query->andFilterWhere(['like', new \yii\db\Expression('tipo_evento.denominazione'), $this->attrTipoEventoMm]);
        $query->andFilterWhere(['like', new \yii\db\Expression('stati_evento.nome'), $this->attrStatiEventoMm]);
        $query->andFilterWhere(['like', new \yii\db\Expression('user_profile.nome'), $this->attrUtenzeMm]);

        return $dataProvider;
    }
}
