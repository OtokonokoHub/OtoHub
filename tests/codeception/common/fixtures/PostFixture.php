<?php

namespace tests\codeception\common\fixtures;

use yii\test\ActiveFixture;

/**
 * User fixture
 */
class PostFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Post';
    public $depends = ['tests\codeception\common\fixtures\UserFixture'];
    public function load(){
        $this->resetTable();
        $this->data = [];
        $table      = $this->getTableSchema();
        $ids        = \common\models\User::find()->column();
        foreach ($this->getData() as $alias => $row) {
            shuffle($ids);
            $row['author'] = $ids[0];
            $primaryKeys = $this->db->schema->insert($table->fullName, $row);
            $this->data[$alias] = array_merge($row, $primaryKeys);
        }
    }
}
