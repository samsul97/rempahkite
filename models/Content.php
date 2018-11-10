<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property int $id_info
 * @property string $title
 * @property string $brief_content
 * @property string $full_content
 * @property int $status
 * @property string $image
 * @property string $created_at
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_info', 'title', 'brief_content', 'full_content', 'status', 'image', 'created_at'], 'required'],
            [['id_info', 'status'], 'integer'],
            [['brief_content', 'full_content'], 'string'],
            [['created_at'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_info' => 'Id Info',
            'title' => 'Title',
            'brief_content' => 'Brief Content',
            'full_content' => 'Full Content',
            'status' => 'Status',
            'image' => 'Image',
            'created_at' => 'Created At',
        ];
    }
}
