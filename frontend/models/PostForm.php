<?php

namespace frontend\models;

use Yii;
use yii\base\Event;
use yii\web\UploadedFile;

class PostForm extends Post
{
    public $content;
    /**
     * @var UploadedFile[]
     */
    public $images;
    public $tags;

    const BEFORE_POST_CREATE = 'beforePostCreate';
    const AFTER_POST_CREATE = 'afterPostCreate';

    public function rules()
    {
        return [
            ['content', 'filter', 'filter' => 'htmlspecialchars'],
            ['content', 'required'],

            [['images'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 9],

            ['tags','trim'],
        ];
    }

    public function createPost()
    {
        if($this->validate()){
            $post = new Post();
            $post->content = $this->content;
            $post->hasImage = sizeof($this->images) > 0;
            Event::trigger($this,self::BEFORE_POST_CREATE,['post' => $post]);
            $post->save();
            Event::trigger($this,self::AFTER_POST_CREATE,['post' => $post]);
            foreach($this->images as $file){
                if(empty($file)){
                    continue;
                }
                $image = new Image();
                $image->createFromUploadFile($file);
                $post->link('images',$image);
            }
            if(!empty($this->tags)){
                $this->tags = str_replace('，',',',$this->tags);
                foreach(explode(',',$this->tags) as $tagName){
                    $tag = Tag::getTag($tagName);
                    $post->link('tags',$tag);
                }
            }
        }
        return null;
    }
}