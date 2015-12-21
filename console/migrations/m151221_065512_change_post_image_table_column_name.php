<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_065512_change_post_image_table_column_name extends Migration
{
    public function up()
    {
        $this->renameColumn('post_image','postId','post_id');
        $this->renameColumn('post_image','imageId','image_id');
    }

    public function down()
    {
        echo "m151221_065512_change_post_image_table_column_name cannot be reverted.\n";

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
