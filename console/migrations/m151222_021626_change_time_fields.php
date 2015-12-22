<?php

use yii\db\Schema;
use yii\db\Migration;

class m151222_021626_change_time_fields extends Migration
{
    public function up()
    {
        $this->renameColumn('post','time','created_at');
        $this->renameColumn('forward','time','created_at');
    }

    public function down()
    {
        echo "m151222_021626_change_time_fields cannot be reverted.\n";

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
