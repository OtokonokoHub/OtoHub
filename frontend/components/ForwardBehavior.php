<?php
namespace frontend\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class ForwardBehavior extends Behavior
{
    // 其它代码

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => function($event){
                $f = @fsockopen('unix:///run/otohub/feed.sock');
                if ($f) {
                    fwrite($f, json_encode(['post_id' => $event->sender->post_id, 'user_id' => \Yii::$app->user->getId(), 'forward_id' => $event->sender->id]));
                    fclose($f);
                }
                else{
                    $queue = new \frontend\models\PostFeedQueue(['post_id' => $event->sender->post_id, 'forward_id' => $event->sender->id]);
                    $queue->save();
                }
            },
        ];
    }
}