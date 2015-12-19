<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_110450_update_post_image_table extends Migration
{
    public function up()
    {
        $this->addColumn('post_image', 'offset', $this->smallInteger()->notNull()->defaultValue(0));
        $this->createIndex('postId_imageId_offset', 'post_image', ['postId', 'imageId', 'offset'], true);
        $this->createIndex('imageId', 'post_image', 'imageId');
    }

    public function down()
    {
        echo "m151219_110450_update_post_image_table cannot be reverted.\n";

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
