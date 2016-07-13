<?php

use yii\db\Migration;

/**
 * Handles the creation for table `option_values`.
 */
class m160712_200833_create_option_values_table extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%option_values}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(128),
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
        $this->dropTable('{{%option_values}}');
    }
}
