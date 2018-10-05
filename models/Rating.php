<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property int $id_produk
 * @property int $id_customer
 * @property int $bintang
 * @property string $komentar
 * @property int $id_deleted
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produk', 'id_customer', 'bintang', 'komentar', 'id_deleted'], 'required'],
            [['id_produk', 'id_customer', 'bintang', 'id_deleted'], 'integer'],
            [['komentar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_produk' => 'Id Produk',
            'id_customer' => 'Id Customer',
            'bintang' => 'Bintang',
            'komentar' => 'Komentar',
            'id_deleted' => 'Id Deleted',
        ];
    }
}
