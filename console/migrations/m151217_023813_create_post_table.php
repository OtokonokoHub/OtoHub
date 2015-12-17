<?php

use yii\db\Schema;
use yii\db\Migration;

class m151217_023813_create_post_table extends Migration
{
    public function up()
    {
		$this->createTable('post',[
            'id' => Schema::TYPE_PK,
            'content' => Schema::TYPE_TEXT,
            'likes' => Schema::TYPE_INTEGER,
            'RTs' => Schema::TYPE_INTEGER,
            'replies' =>Schema::TYPE_INTEGER,
            'hasImage' => Schema::TYPE_BOOLEAN,
            'postTime' => Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        echo "m151217_023813_create_post_table cannot be reverted.\n";

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
