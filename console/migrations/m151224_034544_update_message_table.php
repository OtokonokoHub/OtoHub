<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_034544_update_message_table extends Migration
{
    public function up()
    {
        $this->renameColumn('message', 'from_id', 'created_by');
        $this->renameColumn('message', 'time', 'created_at');
    }

    public function down()
    {
        echo "m151224_034544_update_message_table cannot be reverted.\n";

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
