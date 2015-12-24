<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "forward".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $created_by
 * @property integer $status
 * @property integer $created_at
 */
class Forward extends \yii\db\ActiveRecord
{
    public function behaviors(){
        $result = 
        [
            [
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
            [
                'class'              => BlameableBehavior::className(),
                'updatedByAttribute' => false,
            ],
            \frontend\components\ForwardBehavior::className(),
        ];
        return $result;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forward';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'created_by', 'created_at'], 'required'],
            [['post_id', 'created_by', 'status', 'created_at'], 'integer'],
            [['post_id', 'created_by'], 'unique', 'targetAttribute' => ['post_id', 'created_by'], 'message' => 'The combination of Post ID and Created By has already been taken.']
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
            'created_by' => 'Created By',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
