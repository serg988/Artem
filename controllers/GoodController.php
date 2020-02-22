<?php


namespace app\controllers;


use app\models\Good;
use yii\web\Controller;

class GoodController extends AppController
{
    public function actionIndex($name)
    {
        $good = new Good();
        $good = $good->getOneGood($name);
        $this->setMeta('Суши весла | ' . $good->name);
        return $this->render('index', compact('good'));
    }

}