<?php

use yii\db\Schema;
use yii\db\Migration;

class m151217_024014_create_image_table extends Migration
{
    public function up()
    {
        $this->createTable('image',[
            'id' => Schema::TYPE_PK,
            'path' => Schema::TYPE_STRING,
            'type' => Schema::TYPE_STRING . ' DEFAULT "file" ',
        ]);
    }

    public function down()
    {
        echo "m151217_024014_create_image_table cannot be reverted.\n";

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
