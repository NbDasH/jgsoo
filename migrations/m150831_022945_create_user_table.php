<?php

use yii\db\Schema;
use yii\db\Migration;

class m150831_022945_create_user_table extends Migration
{
    public function up()
    {
		$this->createTable('user',[
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING,
			'password' => Schema::TYPE_STRING,
			'email' => Schema::TYPE_STRING,
			'phone' => Schema::TYPE_BIGINT,
		]);
    }

    public function down()
    {
        $this->dropTable('user');
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
