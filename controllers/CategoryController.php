<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
            'pagination' => [
                'pagesize' => '0',
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionGetseed(){
		$c = Category::find()->all();
		$data = '-----------------------------up------------------------------------<br />';
		foreach($c as $v){
			$data .= ('$this->insert("category",["id"=>"'.$v->id.'","name"=>"'.$v->name.'","parent_id"=>"'.$v->parent_id.'","order_nm"=>"'.$v->order_nm.'"]);<br />');
		}
		
		$data .= '-----------------------------down------------------------------------<br />';
		foreach($c as $v){
			$data .= ('$this->delete("category",["id"=>"'.$v->id.'"]);<br />');
		}
		echo $data;
	}

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id=null)
    {
        $model = new Category();

        if(isset($id)){
            $model->parent_id = $id;
        }

        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post()['Category'];
            foreach($post['name'] as $v){
                $model = new Category();
                $model->parent_id = $post['parent_id'];
                $model->name = $v;
                $model->save();
            }
            return $this->redirect(['index']);
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
