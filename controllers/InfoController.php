<?php

namespace app\controllers;

use Yii;
use app\models\Info;
use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InfoController implements the CRUD actions for Info model.
 */
class InfoController extends Controller
{
	
	public function actionSearch($keyword){
		
		$this->layout = 'create_list';
		$key = explode(' ',$keyword);
		$key = array_filter($key);
		$info_c = Info::find()
					->select(['category_id'])
					->where(['or like','title',$key])
					->groupBy(['category_id'])
					->all();
					
		$query = Info::find()->where(['and',['category_id' => isset($info_c[0]) ? $info_c[0]->category_id : ''],['or like','title',$key]]);
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		$pages->setPageSize(10,true);
		$data = $query->offset($pages->offset)
					->limit($pages->limit)
					->all();
		
		foreach($key as $k => $v){
			$key[$k] = "/(".$v.")/i";
		}
		
		foreach($data as $k => $v){
			$data[$k]->title = preg_replace($key,"<span style='color:red;'>$1</span>",$data[$k]->title);
		}
		
		return $this->render('search', [
            'info_c' => $info_c,
			'data'=>$data,
			'pages' => $pages,
        ]);
	}

    public function actionCategory_list()
    {
		$this->layout = 'create_list';
        $categories = Category::get_root_title();
        return $this->render('category_list', [
            'categories' => $categories,
        ]);
    }

    public function actionCategory_second_list($id)
    {
		$this->layout = 'create_list';
        $categories = Category::get_third_title($id);
        return $this->render('category_second_list', [
            'categories' => $categories,
        ]);
    }
	
	public function actionUpload_iframe($type){
		$this->enableCsrfValidation = false;
		
        if (Yii::$app->request->isPost){
			$err = '';
			if($_FILES['photo']['size'] >= '4096000'){
				$err = '请不要上传超过4M的文件！';
			}
			if(!in_array($_FILES['photo']['type'],array('image/jpeg','image/png','image/gif'))){
				$err = '请选择后缀名为jpg,png,gif的图片上传！';
			}
			
			if($err){
				yii::$app->session->setFlash('upload_err', $err);
				return $this->renderPartial('upload_iframe');
			}else{
				$file_name = md5(rand(1,10000).time());
				Info::photo_resize($_FILES['photo']['name'],$_FILES['photo']['tmp_name'],200,200,Yii::getAlias("@webroot").'/info_upload/temp/'.$file_name.'.jpg');
				Info::photo_resize($_FILES['photo']['name'],$_FILES['photo']['tmp_name'],100,100,Yii::getAlias("@webroot").'/info_upload/temp/'.$file_name.'_min.jpg');
				
				return $this->renderPartial('upload_iframe',['type'=>$type,'file_name'=>$file_name]);
			}
			
			
			
        } else {
            return $this->renderPartial('upload_iframe');
        }
	}

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Info models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Info::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Info model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Info model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = 'create_list';
        $model = new Info();

        if(Yii::$app->request->isPost){
            $model->category_id = $id;
            $model->time = time();
            $model->user_id = 1;
        }

        if ($model->load(Yii::$app->request->post())){ // && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $view = Info::get_view($id);
            return $this->render('create', [
                'model' => $model,
                'view' => $view,
				'id' => $id
            ]);
        }
    }

    /**
     * Updates an existing Info model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Info model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Info model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Info the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Info::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
