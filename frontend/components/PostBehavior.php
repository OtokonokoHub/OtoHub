<?php
namespace frontend\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class PostBehavior extends Behavior
{
    // 其它代码

    public function events()
    {
        return [
            ActiveRecord::EVENT_INIT => function($event){
                $event->sender->likes   = 0;
                $event->sender->replies = 0;
                $event->sender->RTs     = 0;
            },
            ActiveRecord::EVENT_BEFORE_INSERT => function($event){
                $event->sender->author = Yii::$app->user->getId();
            },
            ActiveRecord::EVENT_AFTER_INSERT => function($event){
                $f = @fsockopen('unix:///run/otohub/feed.sock');
                if ($f) {
                    fwrite($f, json_encode(['post_id' => $event->sender->id, 'user_id' => Yii::$app->user->getId()]));
                    fclose($f);
                }
                else{

                }
            },
        ];
    }
}