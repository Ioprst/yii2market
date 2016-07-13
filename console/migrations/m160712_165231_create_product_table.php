<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product`.
 */
class m160712_165231_create_product_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'weight'=>$this->integer(),
            'color'=>$this->text(),
            'count'=>$this->integer(),
            'price'=>$this->integer(),
            'tCategory'=>$this->integer(),
            'dCreate' => $this->integer(),
            'dUpdate' => $this->integer(),
            'tUserCreate' => $this->integer(),
            'tUserUpdate' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('product');
        return false;
    }
}
