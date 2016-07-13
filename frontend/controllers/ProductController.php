<?php

namespace frontend\controllers;

use Yii;
use backend\models\Order;
use backend\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionBuy($id)
    {
        $orderModel = new Order();
        $orderModel->tProduct = $id;

        Yii::$app->response->format = 'json';

        if ($orderModel->save()) {
            $productModel = $this->findModel($id);
            if ($productModel->count){
                $productModel->count -= 1;
            }
            $productModel->save(true, ['count']);
            return ['result:ok'];
        }else {
            if ($model->errors) {
                return  ['errors'=> $orderModel->errors];
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
