<?php
namespace common\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class CategoryBehavior extends Behavior
{
    // 其它代码

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => function($event){
                self::deleteCache($event);
            },
            ActiveRecord::EVENT_AFTER_UPDATE => function($event){
                if ($event->sender->status != 0) {
                    self::deleteCache($event);
                }
            },
            ActiveRecord::EVENT_AFTER_INSERT => function($event){
                \Yii::$app->cache->set("category.alias.{$event->sender->alias}", $event->sender->alias);
                \Yii::$app->cache->set("category.id.{$event->sender->id}", $event->sender->id);
            }
        ];
    }

    private function deleteCache($event){
        \Yii::$app->cache->deleteValue("category.alias.{$event->sender->alias}");
        \Yii::$app->cache->deleteValue("category.id.{$event->sender->id}");
        $parent = $event->sender->parent();
        if ($$parent != null) {
            \Yii::$app->cache->deleteValue("category.childs.{$parent->id}");
        }
    }
}