<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\controllers\CommonController;
use backend\models\Product;
use backend\models\ProductSearch;
use backend\models\Option;
use backend\models\ProductOptionValue;

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
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save() && $model->saveOptions($post)) {
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

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post = Yii::$app->request->post();

        $productOptionValues = ProductOptionValue::getOptionsValues($id);
        if ($model->load($post) && $model->save() && $model->saveOptions($post)) {
            Yii::$app->response->format = 'json';
            return ['result'=>'ok'];
        } else {
            if(Yii::$app->request->isAjax) {
                if ($model->errors) {
                    Yii::$app->response->format = 'json';
                    return  ['errors'=> $model->errors];
                }
               return $this->renderAjax('update', [
                   'model' => $model,
                   'optionValues' => $productOptionValues
               ]);
            } else {
               return $this->render('update', [
                   'model' => $model,
                   'optionValues' => $productOptionValues
               ]);
            }
        }
    }

    public function actionChangeValue($option, $product, $value)
    {
        if (!$option || !$product) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $optionModel = ProductOptionValue::find()->where(['tProduct'=> $product, 'tOption'=> $option])->one();
        $optionModel->tValue = $value;
        $optionModel->save();

        if(Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return ['result'=>'ok'];
        }
    }

    public function actionDeleteOption($option, $product)
    {
        if (!$option || !$product) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $optionModel = ProductOptionValue::find()->where(['tProduct'=> $product, 'tOption'=> $option])->one();
        $optionModel->delete();

        if(Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return ['result'=>'ok'];
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
