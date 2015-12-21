<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_065501_change_post_tag_table_column_name extends Migration
{
    public function up()
    {
        $this->renameColumn('post_tag','postId','post_id');
        $this->renameColumn('post_tag','tagId','tag_id');
    }

    public function down()
    {
        echo "m151221_065501_change_post_tag_table_column_name cannot be reverted.\n";

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
