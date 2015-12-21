<?php

use yii\db\Schema;
use yii\db\Migration;

class m151220_053747_create_post_feed_table extends Migration
{
    public function up()
    {
        $this->createTable('post_feed',[
            'id'         => $this->primaryKey()->notNull(),
            'post_id'    => $this->integer()->notNull(),
            'user_id'    => $this->integer()->notNull(),
            'forward_id' => $this->integer()->notNull()->defaultValue(0),
            'status'     => $this->boolean()->notNull()->defaultValue(0),
        ]);
        $this->createIndex('user_id_id','post_feed', ['user_id', 'id']);
        $this->createIndex('user_id_post_id_forward_id','post_feed', ['user_id', 'post_id', 'forward_id'], true);
    }

    public function down()
    {
        echo "m151220_053747_create_post_feed_table cannot be reverted.\n";

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
