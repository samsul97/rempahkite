<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keranjang".
 *
 * @property int $id
 * @property int $id_customer
 * @property string $token
 */
class Keranjang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'keranjang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'token'], 'required'],
            [['id_customer'], 'integer'],
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
        ];
    }
}
