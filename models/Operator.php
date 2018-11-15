<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operator".
 *
 * @property int $id
 * @property string $nama
 * @property string $email
 * @property string $alamat
 * @property string $no_telp
 * @property int $status
 */
class Operator extends \yii\db\ActiveRecord
{
    public $username;
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'match', 'pattern' => '/^[a-z]\w*$/i', 'message' => 'Username tidak boleh kosong'],
            [['password'], 'string', 'min' => 6],
            [['nama'], 'match', 'pattern' => '/^[a-z]\w*$/i', 'message' => 'Username tidak boleh kosong'],
            [['nama', 'email', 'alamat', 'no_telp'], 'required'],
            [['email'], 'email'],
            [['status'], 'integer'],
            [['no_telp'], 'match', 'pattern' => '/((\+[0-9]{6})|0)[-]?[0-9]{7}/', 'message' => 'Hanya dari nomor 0 sampai 9'],
            [['nama', 'email', 'alamat', 'no_telp'], 'string', 'max' => 255],
            [['foto'], 'file', 'extensions'=>'jpg, gif, png', 'maxSize'=>5218288, 'tooBig' => 'batas limit upload gambar 5mb'],
            // ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'status' => 'Status',
        ];
    }

    // public function ()
    // {
    //     # code...
    // }
}
