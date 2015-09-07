<?php

namespace app\controllers;

use Yii;
use app\models\Weather;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WeatherController implements the CRUD actions for Weather model.
 */
class WeatherController extends Controller
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
	
	public function actionGetweather($ip){
		$city = json_decode(file_get_contents("http://route.showapi.com/20-1?showapi_appid=8234&showapi_sign=2058a9b7e9e348b7b2990d756a20c719&showapi_timestamp=".date('YmdHis')."&ip=".$ip))->showapi_res_body->city;
		
		$w = Weather::find()->where(['city'=>$city])->one();
		
		if(!$w){
			$m = new Weather;
			$m->time = time();
			$m->city = $city;
			$m->json_data = file_get_contents("http://route.showapi.com/9-2?showapi_appid=8234&showapi_sign=2058a9b7e9e348b7b2990d756a20c719&showapi_timestamp=".date('YmdHis')."&area=".$city);
			$m->save();
			$weather = $m->json_data;
		}else{
			
			if(time() - $w->time > 600){
				$w->time = time();
				$w->json_data = file_get_contents("http://route.showapi.com/9-2?showapi_appid=8234&showapi_sign=2058a9b7e9e348b7b2990d756a20c719&showapi_timestamp=".date('YmdHis')."&area=".$city);
				$w->save();
				$weather = $w->json_data;
			}else{
				$weather = $w->json_data;
			}	
		}
		
		echo $weather;
	}

    /**
     * Lists all Weather models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Weather::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Weather model.
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
     * Creates a new Weather model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Weather();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Weather model.
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
     * Deletes an existing Weather model.
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
     * Finds the Weather model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Weather the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Weather::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
