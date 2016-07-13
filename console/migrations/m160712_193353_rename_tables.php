<?php

use yii\db\Migration;

class m160712_193353_rename_tables extends Migration
{
    public function up()
    {
        $this->renameTable('product_option', 'option');
        $this->renameTable('product_category', 'category');
    }

    public function down()
    {
        $this->renameTable('option','product_option');
        $this->renameTable('category', 'product_category');

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
