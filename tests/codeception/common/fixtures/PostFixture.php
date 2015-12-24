<?php

namespace tests\codeception\common\fixtures;

use yii\test\ActiveFixture;

/**
 * User fixture
 */
class PostFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Post';
    public $depends    = ['tests\codeception\common\fixtures\UserFixture'];
    public function load(){
        $this->resetTable();
        $table = $this->getTableSchema();
        $ids   = \common\models\User::find()->column();
        $wait  = $this->getData();
        $bat   = [];
        while (count($wait)>0) {
            $item = array_shift($wait);
            shuffle($ids);
            $push = [];
            $push[] = $item['content'];
            $push[] = $item['likes'];
            $push[] = $item['RTs'];
            $push[] = $item['replies'];
            $push[] = $item['hasImage'];
            $push[] = $ids[0];
            $push[] = $item['created_at'];
            $push[] = $item['status'];
            $bat[] = $push;
            if (count($bat) == 3000 || count($wait) == 0) {
                echo time();
                echo "\r\n";
                $sql = $this->db->createCommand()->batchInsert($table->fullName, ['content', 'likes', 'RTs', 'replies', 'hasImage', 'created_by', 'created_at', 'status'], $bat);
                unset($bat);
                echo time();
                echo "\r\n";
                $sql->execute();
                echo time();
                echo "\r\n\r\n\r\n";
                $bat = [];
            }
        }
        
    }
}
