<?php

use yii\db\Schema;
use yii\db\Migration;

class m150828_075352_create_category_table extends Migration
{
    public function up()
    {
		$this->createTable('category',[
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING,
			'parent_id' => Schema::TYPE_INTEGER,
			'order_nm' => Schema::TYPE_INTEGER.' DEFAULT 0 ',
		]);
    }

    public function down()
    {
        $this->dropTable('category');
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
