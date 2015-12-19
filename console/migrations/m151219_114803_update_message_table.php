<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_114803_update_message_table extends Migration
{
    public function up()
    {
        $this->addColumn('message', 'id', $this->primaryKey());
        $this->createIndex('to_id_id','message', ['to_id', 'id']);
        $this->dropIndex('to_id', 'message');
    }

    public function down()
    {
        echo "m151219_114803_update_message_table cannot be reverted.\n";

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
