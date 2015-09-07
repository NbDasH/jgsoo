<?php

use yii\db\Schema;
use yii\db\Migration;

class m150907_020643_create_weather extends Migration
{
     public function up()
    {
		$this->createTable('weather',[
			'id' => Schema::TYPE_PK,
			'city' => Schema::TYPE_STRING,
			'time' => Schema::TYPE_INTEGER,
			'json_data' => Schema::TYPE_TEXT,
		]);
		$this->createIndex ('weather_index', 'weather', 'city');
    }

    public function down()
    {
        $this->dropTable('weather');
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
