<?php

use yii\db\Migration;

class m160713_162103_add_product_photo_field extends Migration
{
    public function up()
    {
        $this->addColumn('{{product}}', 'photo', 'VARCHAR(255) NULL DEFAULT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{product}}', 'photo');

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
