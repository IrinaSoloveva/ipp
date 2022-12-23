<?php

namespace app\models\filters;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Request;

/**
 * RequestFilter represents the model behind the search form of `app\models\tables\Request`.
 */
class RequestFilter extends Request
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'academic_year', 'users_id_request', 'users_id_response', 'status_id', 'response_id'], 'integer'],
            [['table_name', 'date_request', 'date_response'], 'safe'],
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
        $query = Request::find();

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
            'date_request' => $this->date_request,
            'date_response' => $this->date_response,
            'academic_year' => $this->academic_year,
            'users_id_request' => $this->users_id_request,
            'users_id_response' => $this->users_id_response,
            'status_id' => $this->status_id,
            'response_id' => $this->response_id,
        ]);

        $query->andFilterWhere(['like', 'table_name', $this->table_name]);

        return $dataProvider;
    }
}
