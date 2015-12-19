<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_152315_update_post_table extends Migration
{
    public function up()
    {
        $this->addColumn('post', 'author', $this->integer()->notNull());
        $this->addColumn('post', 'forward_total', $this->integer()->notNull()->defaultValue(0));
        $this->addColumn('post', 'time', $this->integer()->notNull()->defaultValue(0));
        $this->addColumn('post', 'status', $this->boolean()->notNull()->defaultValue(0));
        $this->alterColumn('post', 'likes', $this->integer()->notNull()->defaultValue(0));
        $this->alterColumn('post', 'RTs', $this->integer()->notNull()->defaultValue(0));
        $this->alterColumn('post', 'replies', $this->integer()->notNull()->defaultValue(0));
        $this->alterColumn('post', 'hasImage', $this->boolean()->notNull());
        $this->alterColumn('post', 'content', $this->text()->notNull());
        $this->dropColumn('post', 'postTime');
        $this->createIndex('author_id', 'post', ['author', 'id']);
        $this->createIndex('likes_time_author', 'post', ['likes', 'time', 'author']);
        $this->createIndex('RTs_time_author', 'post', ['RTs', 'time', 'author']);
        $this->createIndex('replies_time_author', 'post', ['replies', 'time', 'author']);
        $this->createIndex('forward_total_time_author', 'post', ['forward_total', 'time', 'author']);
    }

    public function down()
    {
        echo "m151219_152315_update_post_table cannot be reverted.\n";

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
