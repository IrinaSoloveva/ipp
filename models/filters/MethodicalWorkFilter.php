<?php

namespace app\models\filters;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\MethodicalWork;

/**
 * MethodicalWorkFilter represents the model behind the search form of `app\models\tables\MethodicalWork`.
 */
class MethodicalWorkFilter extends MethodicalWork
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mark_number_one', 'mark_number_two', 'type_methodical_work_id', 'request_id', 'mark_name_one_id', 'mark_name_two_id'], 'integer'],
            [['discipline_one', 'mark_date_one', 'discipline_two', 'mark_date_two'], 'safe'],
            [['load_plan_one', 'load_fact_one', 'load_plan_two', 'load_fact_two'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MethodicalWork::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'load_plan_one' => $this->load_plan_one,
            'load_fact_one' => $this->load_fact_one,
            'mark_date_one' => $this->mark_date_one,
            'mark_number_one' => $this->mark_number_one,
            'load_plan_two' => $this->load_plan_two,
            'load_fact_two' => $this->load_fact_two,
            'mark_date_two' => $this->mark_date_two,
            'mark_number_two' => $this->mark_number_two,
            'type_methodical_work_id' => $this->type_methodical_work_id,
            'request_id' => $this->request_id,
            'mark_name_one_id' => $this->mark_name_one_id,
            'mark_name_two_id' => $this->mark_name_two_id,
        ]);

        $query->andFilterWhere(['like', 'discipline_one', $this->discipline_one])
            ->andFilterWhere(['like', 'discipline_two', $this->discipline_two]);

        return $dataProvider;
    }
}
