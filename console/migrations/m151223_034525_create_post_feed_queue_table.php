<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_034525_create_post_feed_queue_table extends Migration
{
    public function up()
    {
        $this->createTable('post_feed_queue',[
            'id' => $this->primaryKey(),
            'post_id'   => $this->integer()->notNull(),
        ]);
        $this->createIndex('post_id','post_feed_queue', 'post_id');
    }

    public function down()
    {
        echo "m151223_034525_create_post_feed_queue_table cannot be reverted.\n";

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
