<?php

namespace frontend\models;

use common\models\User;
use Faker\Provider\Image;
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
 * @property string $postTime
 */
class Post extends \common\models\Post
{

    public function behaviors(){
        $result = parent::behaviors();
        $result[] =\frontend\components\PostBehavior::className();
        return $result;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(),['id' => 'user_id'])
            ->viaTable('user_post',['post_id' => 'id']);
    }

    public function getImages()
    {
        return $this->hasMany(\frontend\models\Image::className(),['id' => 'image_id'])
            ->viaTable('post_image',['post_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(),['id' => 'tag_id'])
            ->viaTable('post_tag',['post_id' => 'id']);
    }

}
