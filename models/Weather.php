<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weather".
 *
 * @property integer $id
 * @property string $city
 * @property integer $time
 * @property string $json_data
 */
class Weather extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weather';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'integer'],
            [['json_data'], 'string'],
            [['city'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'time' => 'Time',
            'json_data' => 'Json Data',
        ];
    }
}
