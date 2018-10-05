<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id
 * @property string $nama_produk
 * @property int $stok
 * @property int $quantity_minimum
 * @property double $harga
 * @property string $deskripsi_barang
 * @property string $sku
 * @property string $preview_url
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_produk', 'stok', 'quantity_minimum', 'harga', 'deskripsi_barang', 'sku', 'preview_url'], 'required'],
            [['stok', 'quantity_minimum'], 'integer'],
            [['harga'], 'number'],
            [['nama_produk', 'deskripsi_barang', 'sku', 'preview_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_produk' => 'Nama Produk',
            'stok' => 'Stok',
            'quantity_minimum' => 'Quantity Minimum',
            'harga' => 'Harga',
            'deskripsi_barang' => 'Deskripsi Barang',
            'sku' => 'Sku',
            'preview_url' => 'Preview Url',
        ];
    }
}
