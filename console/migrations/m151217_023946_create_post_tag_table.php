<?php

use yii\db\Schema;
use yii\db\Migration;

class m151217_023946_create_post_tag_table extends Migration
{
    public function up()
    {
        $this->createTable('post_tag',[
            'id' => Schema::TYPE_PK,
            'postId' => Schema::TYPE_INTEGER,
            'tagId' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        echo "m151217_023946_create_post_tag_table cannot be reverted.\n";

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
