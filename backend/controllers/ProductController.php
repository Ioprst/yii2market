<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\controllers\CommonController;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends CommonController
{
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
               Yii::$app->response->format = 'json';
               return ['result:ok'];
        } else {
            if(Yii::$app->request->isAjax) {
               if ($model->errors) {
                   Yii::$app->response->format = 'json';
                   return  ['errors'=> $model->errors];
               }
               return $this->renderAjax('create', [
                   'model' => $model,
               ]);
            } else {
               return $this->render('create', [
                   'model' => $model,
               ]);
            }
        }
    }
    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
