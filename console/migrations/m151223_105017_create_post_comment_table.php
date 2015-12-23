<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_105017_create_post_comment_table extends Migration
{
    public function up()
    {
        $this->createTable('post_comment',[
            'id'         => $this->primaryKey(),
            'post_id'    => $this->integer()->notNull(),
            'quote'      => $this->integer()->notNull()->defaultValue(0),
            'author'     => $this->integer()->notNull(),
            'content'    => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'status'     => $this->boolean()->notNull()->defaultValue(0),
        ]);
        $this->createIndex('post_id_id', 'post_comment', ['post_id', 'id']);
    }

    public function down()
    {
        echo "m151223_105017_create_post_comment_table cannot be reverted.\n";

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
