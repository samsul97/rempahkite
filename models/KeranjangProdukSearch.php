<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KeranjangProduk;

/**
 * KeranjangProdukSearch represents the model behind the search form of `app\models\KeranjangProduk`.
 */
class KeranjangProdukSearch extends KeranjangProduk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_keranjang', 'id_produk', 'id_pesanan', 'produk_quantity', 'id_jasa_kirim'], 'integer'],
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
        $query = KeranjangProduk::find();

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
            'id_keranjang' => $this->id_keranjang,
            'id_produk' => $this->id_produk,
            'id_pesanan' => $this->id_pesanan,
            'produk_quantity' => $this->produk_quantity,
            'harga' => $this->harga,
            'id_jasa_kirim' => $this->id_jasa_kirim,
        ]);

        return $dataProvider;
    }
}
