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
            ActiveRecord::EVENT_AFTER_INSERT => function($event){
                $f = @fsockopen('unix:///run/otohub/feed.sock');
                if ($f) {
                    fwrite($f, json_encode(['post_id' => $event->sender->id, 'user_id' => \Yii::$app->user->getId()]));
                    fclose($f);
                }
                else{

                }
            },
        ];
    }
}