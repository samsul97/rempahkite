<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesanan".
 *
 * @property int $id
 * @property int $id_customer
 * @property string $token
 * @property string $tgl_transaksi
 * @property double $jumlah_total
 * @property int $status
 */
class Pesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'token', 'tgl_transaksi', 'jumlah_total', 'status'], 'required'],
            [['id_customer', 'status'], 'integer'],
            [['tgl_transaksi'], 'safe'],
            [['jumlah_total'], 'number'],
            [['token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_customer' => 'Id Customer',
            'token' => 'Token',
            'tgl_transaksi' => 'Tgl Transaksi',
            'jumlah_total' => 'Jumlah Total',
            'status' => 'Status',
        ];
    }
}
