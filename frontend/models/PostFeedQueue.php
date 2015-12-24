<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "post_feed_queue".
 *
 * @property integer $id
 * @property integer $post_id
 */
class PostFeedQueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_feed_queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'required'],
            [['post_id'], 'integer'],
            [['post_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
        ];
    }
}
