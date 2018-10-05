<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $id
 * @property string $method
 * @property string $status
 * @property string $id_transaksi
 * @property int $id_pesanan
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['method', 'status', 'id_transaksi', 'id_pesanan'], 'required'],
            [['id_pesanan'], 'integer'],
            [['method', 'status', 'id_transaksi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'method' => 'Method',
            'status' => 'Status',
            'id_transaksi' => 'Id Transaksi',
            'id_pesanan' => 'Id Pesanan',
        ];
    }
}