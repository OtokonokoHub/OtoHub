<?php

namespace common\models;

use Yii;

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
            [['likes', 'RTs', 'replies', 'hasImage', 'author', 'forward_total', 'time', 'status'], 'integer']
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
            'time' => 'Time',
            'status' => 'Status',
        ];
    }

    public function insert($runValidation = true, $attributes = NULL){
        $result = parent::insert($runValidation, $attributes);
        if ($result) {
            $f = fsockopen('tcp://127.0.0.1', 5555);
            if ($f) {
                fwrite($f, json_encode(['post_id' => $this->id, 'user_id' => Yii::$app->user->getId()]));
            }
            fclose($f);
        }
        return $result;
    }
}
