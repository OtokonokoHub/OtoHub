<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_092221_update_user_table extends Migration
{
    public function up()
    {
        $this->createIndex('nick', '{{%user}}', 'nick', true);
        $this->createIndex('id_auth_key', '{{%user}}', ['id', 'auth_key'], true);
    }

    public function down()
    {
        echo "m151219_092221_update_user_table cannot be reverted.\n";

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
