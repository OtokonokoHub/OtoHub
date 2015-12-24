<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_035758_update_post_feed_queue_table extends Migration
{
    public function up()
    {
        $this->dropIndex('post_id', 'post_feed_queue');
        $this->createIndex('post_id', 'post_feed_queue', 'post_id', true);
    }

    public function down()
    {
        echo "m151224_035758_update_post_feed_queue_table cannot be reverted.\n";

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
