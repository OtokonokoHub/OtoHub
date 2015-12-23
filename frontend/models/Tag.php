<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $name
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(),['id' => 'post_id'])
            ->viaTable('post_tag',['tag_id' => 'id']);
    }

    /**
     * @param string $tagName
     * @return Tag $tag
     */
    public static function getTag($tagName)
    {
        $tag = self::find()->where(['name' => $tagName])->one();
        if(empty($tag)){
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
        return $tag;
    }
}
