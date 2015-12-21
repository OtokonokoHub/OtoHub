<?php

use yii\db\Schema;
use yii\db\Migration;

class m151220_112521_create_user_relation_table extends Migration
{
    public function up()
    {
        $this->createTable('user_relation',[
            'id'         => $this->primaryKey()->notNull(),
            'origin'    => $this->integer()->notNull(),
            'target'    => $this->integer()->notNull(),
            'status'     => $this->boolean()->notNull()->defaultValue(0),
        ]);
        $this->createIndex('origin_id','user_relation', ['origin', 'id']);
        $this->createIndex('target_origin','user_relation', ['target', 'origin'], true);
    }

    public function down()
    {
        echo "m151220_112521_create_user_relation_table cannot be reverted.\n";

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
