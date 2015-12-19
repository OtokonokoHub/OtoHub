<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_074325_create_message_table extends Migration
{
    public function up()
    {
        $this->createTable('message',[
            'from_id' => $this->integer()->notNull(),
            'to_id'   => $this->integer()->notNull(),
            'content' => $this->text()->notNull(),
            'status'  => $this->smallInteger()->notNull()->defaultValue(0),
            'title'   => $this->string(32)->noNull(),
            'time'    => $this->integer()->notNull(),
        ]);
        $this->createIndex('to_id','message');
        $this->createIndex('from_id','message');
    }

    public function down()
    {
        echo "m151219_074325_create_message_table cannot be reverted.\n";

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
