<?php

use yii\db\Schema;
use yii\db\Migration;

class m151217_023933_create_tag_table extends Migration
{
    public function up()
    {
        $this->createTable('tag',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        echo "m151217_023933_create_tag_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
