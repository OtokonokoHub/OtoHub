<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_075519_update_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'nick', $this->string(32)->notNull());
        $this->addColumn('{{%user}}', 'head_image', $this->string(32)->notNull());
    }

    public function down()
    {
        echo "m151219_075519_update_user_table cannot be reverted.\n";

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
