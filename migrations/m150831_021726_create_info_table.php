<?php

use yii\db\Schema;
use yii\db\Migration;

class m150831_021726_create_info_table extends Migration
{
    public function up()
    {
		$this->createTable('info',[
			'id' => Schema::TYPE_PK,
			'title' => Schema::TYPE_STRING,
			'price' => Schema::TYPE_FLOAT,
			'addr' => Schema::TYPE_TEXT,
			'name' => Schema::TYPE_STRING,
			'phone' => Schema::TYPE_BIGINT,
			'wechat' => Schema::TYPE_STRING,
			'content' => Schema::TYPE_TEXT,
			'photo' => Schema::TYPE_STRING,
			'identity' => Schema::TYPE_STRING,
			'type' => Schema::TYPE_STRING,
			'house_type' => Schema::TYPE_STRING,
			'house_direction' => Schema::TYPE_STRING,
			'area' => Schema::TYPE_FLOAT,
			'propert_right' => Schema::TYPE_STRING,
			'propert_right_time' => Schema::TYPE_STRING,
			'floor' => Schema::TYPE_INTEGER,
			'all_floor' => Schema::TYPE_INTEGER,
			'feature' => Schema::TYPE_TEXT,
			'select1' => Schema::TYPE_STRING,
			'select2' => Schema::TYPE_STRING,
			'select3' => Schema::TYPE_STRING,
			'select4' => Schema::TYPE_STRING,
			'select5' => Schema::TYPE_STRING,
			'select6' => Schema::TYPE_STRING,
			'other1' => Schema::TYPE_TEXT,
			'other2' => Schema::TYPE_TEXT,
			'other3' => Schema::TYPE_TEXT,
			'user_id' => Schema::TYPE_INTEGER,
			'category_id' => Schema::TYPE_INTEGER,
			'time' => Schema::TYPE_INTEGER,
		]);
    }

    public function down()
    {
		 $this->dropTable('info');
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
