<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_option_value`.
 */
class m160713_082340_create_product_option_value_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_option_value', [
            'id' => $this->primaryKey(),
            'tProduct'=>$this->integer(),
            'tOption' => $this->integer(),
            'tValue' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_option_value');
    }
}
