<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_035834_create_info_feed_table extends Migration
{
    public function up()
    {
        $this->createTable('info_feed',[
            'id'         => $this->primaryKey(),
            'created_by' => $this->integer()->notNull()->defaultValue(0),
            'to_id'      => $this->integer()->notNull(),
            'object_id'  => $this->integer()->notNull(),
            'type'       => $this->boolean()->notNull(),
            'status'     => $this->boolean()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'title'      => $this->string()->notNull(),
            'content'    => $this->string()->notNull(),
            'other'      => $this->text()->notNull(),
        ]);
        $this->createIndex('object_id_type_to_id_created_by', 'info_feed', ['to_id', 'type', 'object_id', 'created_by'], true);
        $this->createIndex('to_id_id_created_by', 'info_feed', ['to_id', 'id', 'created_by']);
    }

    public function down()
    {
        echo "m151224_035834_create_info_feed_table cannot be reverted.\n";

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
