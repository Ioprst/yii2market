<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_option`.
 */
class m160712_171909_create_product_option_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_option}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128),
            'description' => $this->text(),
            'dCreate' => $this->integer(),
            'dUpdate' => $this->integer(),
            'tUserCreate' => $this->integer(),
            'tUserUpdate' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product_option}}');
    }
}
