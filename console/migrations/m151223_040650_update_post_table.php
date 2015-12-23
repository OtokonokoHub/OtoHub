<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_040650_update_post_table extends Migration
{
    public function up()
    {
        $this->dropColumn('post', 'forward_total');
        $this->dropIndex('forward_total_time_author', 'post');
    }

    public function down()
    {
        echo "m151223_040650_update_post_table cannot be reverted.\n";

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
