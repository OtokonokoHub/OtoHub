<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $content
 * @property integer $likes
 * @property integer $RTs
 * @property integer $replies
 * @property integer $hasImage
 * @property integer $author
 * @property integer $forward_total
 * @property integer $time
 * @property integer $status
 */
class Post extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'hasImage', 'author'], 'required'],
            [['content'], 'string'],
            [['likes', 'RTs', 'replies', 'hasImage', 'author', 'created_at', 'status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'likes' => 'Likes',
            'RTs' => 'Rts',
            'replies' => 'Replies',
            'hasImage' => 'Has Image',
            'author' => 'Author',
            'forward_total' => 'Forward Total',
            'status' => 'Status',
        ];
    }

}
