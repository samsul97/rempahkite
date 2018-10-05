<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JasaKirim;

/**
 * JasaKirimSearch represents the model behind the search form of `app\models\JasaKirim`.
 */
class JasaKirimSearch extends JasaKirim
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama_jasa', 'estimasi_waktu'], 'safe'],
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
        $query = JasaKirim::find();

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
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'nama_jasa', $this->nama_jasa])
            ->andFilterWhere(['like', 'estimasi_waktu', $this->estimasi_waktu]);

        return $dataProvider;
    }
}
