<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_043013_create_category_table extends Migration
{
    public function up()
    {
        $this->createTable('category',[
            'id'               => $this->primaryKey(),
            'alias'            => $this->string(64)->notNull(),
            'meta_title'       => $this->string(64)->notNull()->defaultValue(''),
            'meta_keywords'    => $this->string(64)->notNull()->defaultValue(''),
            'meta_description' => $this->string()->notNull()->defaultValue(''),
            'parent'           => $this->integer()->notNull()->defaultValue(0),
            'label'            => $this->string(64)->notNull(),
            'path'             => $this->string()->notNull()->defaultValue(''),
            'status'           => $this->boolean()->notNull()->defaultValue(0),
            'thumb'            => $this->integer()->notNull(),
            'description'      => $this->string()->notNull()->defaultValue(''),
        ]);
        $this->createIndex('alias', 'category', 'alias', true);
        $this->createIndex('parent', 'category', 'parent');
    }

    public function down()
    {
        echo "m151223_043013_create_category_table cannot be reverted.\n";

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
