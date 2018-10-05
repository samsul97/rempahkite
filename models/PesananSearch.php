<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pesanan;

/**
 * PesananSearch represents the model behind the search form of `app\models\Pesanan`.
 */
class PesananSearch extends Pesanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_customer', 'status'], 'integer'],
            [['token', 'tgl_transaksi'], 'safe'],
            [['jumlah_total'], 'number'],
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
        $query = Pesanan::find();

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
            'id_customer' => $this->id_customer,
            'tgl_transaksi' => $this->tgl_transaksi,
            'jumlah_total' => $this->jumlah_total,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }
}
