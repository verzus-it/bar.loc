<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userID', 'active'], 'integer'],
            [['totalAmount', 'productTotalAmount', 'deliveryPrice'], 'number'],
            [['deliveryType', 'deliveryData', 'paymentType', 'status'], 'safe'],
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
        $query = Order::find();

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
            'userID' => $this->userID,
            'totalAmount' => $this->totalAmount,
            'productTotalAmount' => $this->productTotalAmount,
            'deliveryPrice' => $this->deliveryPrice,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'deliveryType', $this->deliveryType])
            ->andFilterWhere(['like', 'deliveryData', $this->deliveryData])
            ->andFilterWhere(['like', 'paymentType', $this->paymentType])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
