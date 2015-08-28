<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property integer $id
 * @property string $title
 * @property double $price
 * @property string $addr
 * @property string $name
 * @property integer $phone
 * @property string $wechat
 * @property string $content
 * @property string $photo
 * @property string $identity
 * @property string $type
 * @property string $house_type
 * @property double $area
 * @property integer $propert_right_id
 * @property integer $propert_right_time
 * @property string $floor
 * @property string $feature
 * @property string $facilities
 * @property integer $select1
 * @property integer $select2
 * @property integer $select3
 * @property integer $select4
 * @property integer $select5
 * @property integer $select6
 * @property string $other1
 * @property string $other2
 * @property string $other3
 * @property integer $user_id
 * @property integer $category_id
 * @property integer $time
 *
 * @property User $user
 * @property Category $category
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'propert_right', 'area', 'house_type', 'addr', 'identity', 'name', 'phone', 'user_id', 'category_id', 'time'], 'required'],
            [['price', 'area','all_floor','floor'], 'number'],
            [['addr', 'content', 'feature','propert_right','house_direction','propert_right_time', 'other1', 'other2', 'other3'], 'string'],
            [['select1', 'select2', 'select3', 'select4', 'select5', 'select6', 'user_id', 'category_id', 'time'], 'integer'],
            ['phone','integer','message'=>'请输入一个正确的电话号码，例如：135xxxxxxxx'],
            ['phone','string','max'=>11],
            [['title'], 'string', 'max' => 100],
            [['name', 'house_type'], 'string', 'max' => 20],
            [['wechat', 'identity', 'type'], 'string', 'max' => 50],
            [['photo'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        switch($this->type){
            case 1:
                return [
                    'id' => 'ID',
                    'title' => '标题',
                    'price' => '总价',
                    'addr' => '详细地址',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '房源描述',
                    'photo' => '上传图片',
                    'identity' => '身份',
                    'type' => '供求',
                    'house_type' => '房屋户型',
                    'area' => '建筑面积',
                    'propert_right' => '产权',
                    'propert_right_time' => '产权年限',
                    'floor' => '楼层',
                    'all_floor' => '总楼层',
                    'feature' => '装修情况',
                    'house_direction' => '房间朝向',
                    'select1' => 'Select1',
                    'select2' => 'Select2',
                    'select3' => 'Select3',
                    'select4' => 'Select4',
                    'select5' => 'Select5',
                    'select6' => 'Select6',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
                ];
                break;
            case 2:
                return [
                    'title' => '标题',
                    'price' => '期望价格',
                    'addr' => '期望居住地',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '补充说明',
                    'photo' => '上传图片',
                    'identity' => '身份',
                    'type' => '供求',
                    'house_type' => '期望户型',
                    'area' => '期望面积',
                    'propert_right' => '期望产权',
                    'propert_right_time' => '产权年限',
                    'floor' => '楼层',
                    'all_floor' => '总楼层',
                    'feature' => '装修情况',
                    'house_direction' => '房间朝向',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                ];
                break;
			case 3:
                return [
                    'title' => '标题',
                    'price' => '价格',
                    'addr' => '详细地址',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '服务介绍',
                    'photo' => '店铺外貌',
					'select1' => '类别',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                ];
                break;
			case 4:
                return [
                    'title' => '标题',
					'price' => '转让价格',
                    'addr' => '看车地址',
                    'name' => '联系人',
                    'phone' => '联系电话',
					'select1' => '车型',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                ];
                break;
			case 5:
                return [
                    'title' => '标题',
					'price' => '价格',
                    'addr' => '详细地址',
                    'name' => '联系人',
                    'phone' => '联系电话',
					'wechat' => 'QQ',
					'content' => '服务介绍',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                ];
                break;
			default:
                return [
                    'id' => 'ID',
                    'title' => '标题',
                    'price' => '总价',
                    'addr' => '详细地址',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '房源描述',
                    'photo' => '上传图片',
                    'identity' => '身份',
                    'type' => '供求',
                    'house_type' => '房屋户型',
                    'area' => '建筑面积',
                    'propert_right' => '产权',
                    'propert_right_time' => '产权年限',
                    'floor' => '楼层',
                    'all_floor' => '总楼层',
                    'feature' => '装修情况',
                    'house_direction' => '房间朝向',
                    'select1' => 'Select1',
                    'select2' => 'Select2',
                    'select3' => 'Select3',
                    'select4' => 'Select4',
                    'select5' => 'Select5',
                    'select6' => 'Select6',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
                ];
                break;
        }
        
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function get_view($id){
        return Category::findOne($id)->parent_id;
    }
}
