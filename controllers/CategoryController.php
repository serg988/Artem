<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Good;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $goods = new Good();
        $goods = $goods->getAllGoods();
        return $this->render('index', compact('goods'));
    }

}