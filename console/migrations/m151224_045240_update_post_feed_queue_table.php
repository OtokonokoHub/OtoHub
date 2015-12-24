<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_045240_update_post_feed_queue_table extends Migration
{
    public function up()
    {
        $this->addColumn('post_feed_queue', 'forward_id', $this->integer()->notNull()->defaultValue(0));
        $this->dropIndex('post_id', 'post_feed_queue');
        $this->createIndex('post_id_foraward_id', 'post_feed_queue', ['post_id', 'forward_id'], true);
    }

    public function down()
    {
        echo "m151224_045240_update_post_feed_queue_table cannot be reverted.\n";

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
