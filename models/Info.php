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
			case 6:
                return [
                    'title' => '标题',
                    'price' => '价格',
					'identity' => '身份',
                    'addr' => '服务范围',
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
			case 7:
                return [
                    'id' => 'ID',
                    'title' => '标题',
                    'price' => '价格',
                    'addr' => '服务范围',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'photo' => '汽车外貌',
                    'select1' => '类别',
                    'select2' => '起点',
                    'select3' => '终点',
                    'select4' => '出发时间',
                    'select5' => '车型',
                    'select6' => '可乘数',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
					'type'=>'供求',
                ];
                break;
			case 8:
                return [
                    'id' => 'ID',
                    'title' => '标题',
                    'price' => '期望价格',
                    'addr' => 'addr',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'photo' => 'photo',
                    'select1' => '起点',
                    'select2' => '终点',
                    'select3' => '出发时间',
                    'select4' => 'Select4',
                    'select5' => 'Select5',
                    'select6' => 'Select6',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
					'type'=>'供求',
                ];
                break;
			case 9:
                return [
                    'id' => 'ID',
                    'title' => '标题',
                    'price' => '租金',
                    'addr' => '小区/商圈/地址',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '房源描述',
                    'photo' => '房间内、大门、外部环境',
                    'type' => '供求',
                    'house_type' => '房屋户型',
                    'area' => '建筑面积',
                    'floor' => '楼层',
                    'all_floor' => '总楼层',
                    'feature' => '装修情况',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
                ];
                break;
			case 10:
                return [
                    'id' => 'ID',
                    'title' => '标题',
                    'price' => '期望租金',
                    'addr' => '求租地段',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => 'content',
                    'photo' => 'photo',
                    'type' => '供求',
                    'house_type' => '期望户型',
                    'area' => '期望面积',
                    'floor' => 'floor',
                    'all_floor' => 'all_floor',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
                ];
                break;
			case 11:
                return [
                    'id' => 'ID',
                    'title' => '标题',
                    'price' => '价格',
                    'addr' => '交易地址',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '服务介绍',
                    'photo' => '宠物图片',
                    'identity' => '身份',
                    'type' => 'type',
                    'select1' => '品种',
                    'select2' => '性别',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
                ];
                break;
			case 12:
                return [
                    'id' => 'ID',
                    'title' => '公司名称',
                    'price' => '薪资',
                    'addr' => '公司地址',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '公司介绍',
                    'identity' => '身份',
					'select1' => 'select1',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
                ];
                break;
			case 13:
                return [
                    'id' => 'ID',
                    'title' => '期望职位',
                    'price' => '期望薪资',
                    'addr' => '期望工作地址',
                    'name' => '个人姓名',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '个人简介',
                    'identity' => '身份',
                    'select1' => '现居住地',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
                ];
                break;
			case 14:
                return [
                    'id' => 'ID',
                    'title' => '标题',
                    'price' => '价格',
                    'addr' => '服务范围',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'other1' => '其他描述',
                    'other2' => '其他描述2',
                    'other3' => '其他描述3',
                    'user_id' => 'User ID',
                    'category_id' => 'Category ID',
                    'time' => 'Time',
                ];
                break;
			case 15:
                return [
					'type' => '供求',
                    'title' => '标题',
                    'price' => '价格',
                    'addr' => '交易地点',
                    'name' => '联系人',
                    'phone' => '联系电话',
                    'wechat' => 'QQ',
                    'content' => '描述',
                    'photo' => '图片',
					'identity' => '身份',
					'select1' => '类别',
					'select1' => '品牌',
                    'select2' => '型号',
                    'select3' => '新旧程度',
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
	
	public function photo_resize($name,$tmp,$x,$y,$save_src){
		$file_type = end(explode('.',$name));
		
		switch($file_type){
			case 'jpg':
				$o_img = imagecreatefromjpeg($tmp);
				break;
			case 'png':
				$o_img = imagecreatefrompng($tmp);
				break;
			case 'gif':
				$o_img = imagecreatefromgif($tmp);
				break;
		}
		
		$o_x = imagesx($o_img);
		$o_y = imagesy($o_img);
		
		$r_x = $x/$o_x;
		$r_y = $y/$o_y;
		$r = $r_x < $r_y ? $r_y : $r_x;
		
		$img = imagecreatetruecolor($x, $y);
		
		imagecopyresampled($img,$o_img,0,0,0,0,$o_x*$r,$o_y*$r,$o_x,$o_y);
		
		imagejpeg($img,$save_src);
		
	}
	
	public function get_today(){
		return strtotime(date("Y-m-d",$this->time));
	}
	
	public function move_images(){
		if(empty($this->photo)){
			return false;
		}
		if(!is_dir(Yii::getAlias("@webroot").'/info_upload/'.$this->get_today())){
			mkdir(Yii::getAlias("@webroot").'/info_upload/'.$this->get_today());
		}
		$photos = explode(';',$this->photo);
		
		foreach($photos as $p){
			rename(Yii::getAlias("@webroot").'/info_upload/temp/'.$p.'.jpg',Yii::getAlias("@webroot").'/info_upload/'.$this->get_today().'/'.$p.'.jpg');
			rename(Yii::getAlias("@webroot").'/info_upload/temp/'.$p.'_min.jpg',Yii::getAlias("@webroot").'/info_upload/'.$this->get_today().'/'.$p.'_min.jpg');
		}
	}
	
	public function first_image($is_min = NULL){
		if(empty($this->photo)){
			return '/images/no_image.jpg';
		}
		
		$photos = explode(';',$this->photo);
		if($is_min){
			return '/info_upload/'.$this->get_today().'/'.$photos[0].'_min.jpg';
		}else{
			return '/info_upload/'.$this->get_today().'/'.$photos[0].'.jpg';
		}
	}
}
