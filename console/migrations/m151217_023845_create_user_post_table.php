<?php

use yii\db\Schema;
use yii\db\Migration;

class m151217_023845_create_user_post_table extends Migration
{
    public function up()
    {
        $this->createTable('user_post',[
            'id' => Schema::TYPE_PK,
            'userId' => Schema::TYPE_INTEGER,
            'postId' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        echo "m151217_023845_create_user_post_table cannot be reverted.\n";

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
