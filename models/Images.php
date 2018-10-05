<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $url
 * @property string $type
 * @property string $id_produk
 * @property string $kunci
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'type', 'id_produk', 'kunci'], 'required'],
            [['url', 'type', 'id_produk', 'kunci'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'type' => 'Type',
            'id_produk' => 'Id Produk',
            'kunci' => 'Kunci',
        ];
    }
}
