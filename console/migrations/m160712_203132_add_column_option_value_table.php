<?php

use yii\db\Migration;

class m160712_203132_add_column_option_value_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{option_values}}', 'tOption', 'INT NOT NULL DEFAULT "0"');
    }

    public function down()
    {
        $this->dropColumn('{{option_values}}', 'tOption');
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
