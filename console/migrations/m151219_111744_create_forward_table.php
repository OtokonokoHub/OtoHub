<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_111744_create_forward_table extends Migration
{
    public function up()
    {
        $this->createTable('forward',[
            'id' => $this->primaryKey()->notNull(),
            'post_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'status'  => $this->smallInteger()->notNull()->defaultValue(0),
            'time'    => $this->integer()->notNull(),
        ]);
        $this->createIndex('user_id_post_id','forward', ['post_id', 'user_id'], true);
        $this->createIndex('user_id','forward', ['user_id', 'id']);
        $this->createIndex('post_id_id','forward', 'post_id');
    }

    public function down()
    {
        echo "m151219_111744_create_forward_table cannot be reverted.\n";

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
