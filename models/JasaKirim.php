<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jasa_kirim".
 *
 * @property int $id
 * @property string $nama_jasa
 * @property double $harga
 * @property string $estimasi_waktu
 */
class JasaKirim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jasa_kirim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama_jasa', 'harga', 'estimasi_waktu'], 'required'],
            [['id'], 'integer'],
            [['harga'], 'number'],
            [['nama_jasa', 'estimasi_waktu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_jasa' => 'Nama Jasa',
            'harga' => 'Harga',
            'estimasi_waktu' => 'Estimasi Waktu',
        ];
    }
}
