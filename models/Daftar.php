<?php

namespace app\models;

use Yii;
use yii\base\Model;



/**
 * LoginForm is the model basename(path)ehind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Daftar extends Model
{
    public $username;
    public $password;
    public $nama;
    public $email;
    public $alamat;
    public $jenis_kelamin;
    public $no_telp;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // [['password','date_var'],'safe'],
            // ['password', 'required', 'on' => ['register']],
            // ['password', 'string', 'min' => 6, 'max' => 72, 'on' => ['register', 'create']],
            // ['username', 'match', 'pattern' => '/^\d{10}$/', 'message'=> 'Kolom harus terisi 10 digit'],
            // [['passwordConfirm'], 'compare', 'compareAttribute' => 'password'],
            // ['website', 'url', 'defaultScheme' => 'http'],
            // ['recaptcha', 'compare', 'compareAttribute' => 'captcha', 'operator' => '=='],
            ['username', 'match', 'pattern' => '/^[a-z]\w*$/i', 'message' => 'Username tidak boleh kosong'],
            [['nama', 'alamat', 'jenis_kelamin'], 'required', 'message'=> 'Data tidak boleh kosong'],
            [['password'], 'string', 'min' => 6],
            ['no_telp', 'match', 'pattern' => '/((\+[0-9]{6})|0)[-]?[0-9]{7}/', 'message' => 'Hanya dari nomor 0 sampai 9'],
            [['email'], 'unique', 'targetClass' => '\app\models\Customer'],
            ['verifyCode', 'captcha'],
        ];
    }
}
