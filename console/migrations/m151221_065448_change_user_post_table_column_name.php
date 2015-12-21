<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_065448_change_user_post_table_column_name extends Migration
{
    public function up()
    {
        $this->renameColumn('user_post','userId','user_id');
        $this->renameColumn('user_post','postId','post_id');
    }

    public function down()
    {
        echo "m151221_065448_change_user_post_table_column_name cannot be reverted.\n";

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
