<?php

namespace backend\controllers;

use Yii;
use backend\models\ProductOption;
use backend\models\OptionValue;
use backend\models\ProductOptionSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\controllers\CommonController;

/**
 * ProductOptionController implements the CRUD actions for ProductOption model.
 */
class ProductOptionController extends CommonController
{

    /**
     * Lists all ProductOption models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductOptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new ProductOption();
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

    public function actionDeleteValue($id)
    {
        $optionValueModel = OptionValue::findOne($id)->delete();
        if(Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return ['result'=>'ok'];
        } else return
            $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $optionValues= Yii::$app->request->post()['OptionValue'];

            foreach ($optionValues as $optionValue) {
                if ($optionValue['id']) {
                    $optionValueModel = OptionValue::findOne($optionValue['id']);
                } else {
                    $optionValueModel = new OptionValue();
                }
                $optionValueModel['text'] = $optionValue['text'];
                $model->link('optionValues', $optionValueModel);
            }

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
               ]);
            } else {
               return $this->render('update', [
                   'model' => $model,
               ]);
            }
        }
    }

    /**
     * Finds the ProductOption model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductOption the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductOption::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
