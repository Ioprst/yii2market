<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_category`.
 */
class m160712_112920_create_product_category_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'dCreate' => $this->integer(),
            'dUpdate' => $this->integer(),
            'tUserCreate' => $this->integer(),
            'tUserUpdate' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%product_category}}');
        return false;
    }
}
