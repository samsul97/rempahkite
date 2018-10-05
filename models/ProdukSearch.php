<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produk;

/**
 * ProdukSearch represents the model behind the search form of `app\models\Produk`.
 */
class ProdukSearch extends Produk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stok', 'quantity_minimum'], 'integer'],
            [['nama_produk', 'deskripsi_barang', 'sku', 'preview_url'], 'safe'],
            [['harga'], 'number'],
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
        $query = Produk::find();

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
            'stok' => $this->stok,
            'quantity_minimum' => $this->quantity_minimum,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'nama_produk', $this->nama_produk])
            ->andFilterWhere(['like', 'deskripsi_barang', $this->deskripsi_barang])
            ->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'preview_url', $this->preview_url]);

        return $dataProvider;
    }
}
