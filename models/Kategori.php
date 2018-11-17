<?php

namespace app\models;

use Yii;
use app\models\Produk;

/**
 * This is the model class for table "kategori".
 *
 * @property int $id
 * @property string $nama_kategori
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kategori'], 'required'],
            [['nama_kategori'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kategori' => 'Nama Kategori',
        ];
    }
    public  static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'nama_kategori');
    }
    public static function getCount()
    {
        return static::find()->count();
    }
    public function getManyProduk()
    {
        return $this->hasMany(Produk::class, ['id_kategori' => 'id']);
    }

    public static function getGrafikList()
    {
        $data = [];
        foreach (static::find()->all() as $produk) {
            $data[] = [StringHelper::truncate($produk->nama, 20), (int) $produk->getManyProduk()->count()];
        }
        return $data;
    }
}
