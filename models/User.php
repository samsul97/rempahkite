<?php

namespace app\models;

use Yii;
use app\models\Customer;
use app\models\Operator;
use yii\helpers\Html;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $id_petugas
 * @property int $id_customer
 * @property int $id_user_role
 * @property int $status
 * @property string $token
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'id_user_role', 'status', 'token'], 'required'],
            [['id_operator', 'id_customer', 'id_user_role', 'status'], 'integer'],
            [['username', 'password', 'token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'id_operator' => 'Operator',
            'id_customer' => 'Customer',
            'id_user_role' => 'User Role',
            'status' => 'Status',
            'token' => 'Token',
        ];
    }

    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'nama');
    }

         //untuk menampilkan di peminjaman buku sebagai nama
    public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['id' => 'id_operator']);
    }

         //untuk menampilkan di peminjaman buku sebagai nama
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'id_customer']);
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' =>$username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
        // return $this->password === $password;
    }
    public static function isAdmin()
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        $model = User::findOne(['username' => Yii::$app->user->identity->username]);
        if ($model == null) {
            return false;
        } elseif ($model->id_user_role == 1) {
            return true;
        }
        return false;
    }

    public static function isCustomer()
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        $model = User::findOne(['username' => Yii::$app->user->identity->username]);
        if ($model == null) {
            return false;
        } elseif ($model->id_user_role == 2) {
            return true;
        }
        return false;
    }

    public static function isOperator()
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        $model = User::findOne(['username' => Yii::$app->user->identity->username]);
        if ($model == null) {
            return false;
        } elseif ($model->id_user_role == 3) {
            return true;
        }
        return false;
    }

    public static function getFotoAdmin($htmlOptions=[])
    {
        return Html::img('@web/user/admin.jpg', $htmlOptions);
    }

    public static function getFotoOperator($htmlOptions=[])
    {
       $query = Operator::find()
       ->andWhere(['id' => Yii::$app->user->identity->id_operator])
       ->one();

       if ($query->foto != null) {
           return Html::img('@web/user/' . $query->foto, $htmlOptions);
       } else {
           return Html::img('@web/user/no-images.png', $htmlOptions);
       }
   }
}
