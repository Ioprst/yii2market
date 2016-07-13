<?php

use yii\db\Migration;

/**
 * Handles the creation for table `orders`.
 */
class m160713_134829_create_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'tProduct'=>$this->integer(),
            'description' => $this->text(),
            'count'=>$this->integer(),
            'status'=>$this->integer(),
            'dCreate' => $this->integer(),
            'dUpdate' => $this->integer(),
            'tUserCreate' => $this->integer(),
            'tUserUpdate' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('orders');
    }
}
