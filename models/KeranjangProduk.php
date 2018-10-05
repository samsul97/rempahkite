<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keranjang_produk".
 *
 * @property int $id
 * @property int $id_keranjang
 * @property int $id_produk
 * @property int $id_pesanan
 * @property int $produk_quantity
 * @property double $harga
 * @property int $id_jasa_kirim
 */
class KeranjangProduk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'keranjang_produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_keranjang', 'id_produk', 'id_pesanan', 'produk_quantity', 'harga', 'id_jasa_kirim'], 'required'],
            [['id_keranjang', 'id_produk', 'id_pesanan', 'produk_quantity', 'id_jasa_kirim'], 'integer'],
            [['harga'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_keranjang' => 'Id Keranjang',
            'id_produk' => 'Id Produk',
            'id_pesanan' => 'Id Pesanan',
            'produk_quantity' => 'Produk Quantity',
            'harga' => 'Harga',
            'id_jasa_kirim' => 'Id Jasa Kirim',
        ];
    }
}
