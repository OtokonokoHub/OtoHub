<?php

use yii\db\Schema;
use yii\db\Migration;

class m151217_024026_create_post_image_table extends Migration
{
    public function up()
    {
        $this->createTable('post_image',[
            'id' => Schema::TYPE_PK,
            'postId' => Schema::TYPE_INTEGER,
            'imageId' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        echo "m151217_024026_create_post_image_table cannot be reverted.\n";

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
