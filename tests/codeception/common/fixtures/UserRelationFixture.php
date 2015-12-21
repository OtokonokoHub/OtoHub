<?php

namespace tests\codeception\common\fixtures;

use yii\test\ActiveFixture;

/**
 * User fixture
 */
class UserRelationFixture extends ActiveFixture
{
    public $tableName = 'user_relation';
    public $depends   = ['tests\codeception\common\fixtures\UserFixture'];
    public function load(){
        $this->resetTable();
        $this->data = [];
        $table      = $this->getTableSchema();
        $ids        = \common\models\User::find()->column();
        $temp       = [];
        foreach ($this->getData() as $alias => $row) {
            do {
                shuffle($ids);
            } while (in_array([$ids[0], $ids[1]], $temp));
            $row['origin'] = $ids[0];
            $row['target'] = $ids[1];
            $temp[] = [$ids[0], $ids[1]];
            $primaryKeys = $this->db->schema->insert($table->fullName, $row);
            $this->data[$alias] = array_merge($row, $primaryKeys);
        }
    }
}
