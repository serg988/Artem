<?php
namespace app\controllers;
use app\models\Category;
use Yii;
use yii\web\Controller;
use app\models\Good;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $this->setMeta('Суши весла');
        $goods = new Good();
        $goods = $goods->getAllGoods();
        return $this->render('index', compact('goods'));
    }

    public function actionView($id)
    {
        $goods = new Good();
        $goods = $goods->getGoodsByCategory($id);
        $category = new Category();
        $category = $category->findCategoryById($id);
        $this->setMeta('Суши весла | ' . $category->browser_name);
        return $this->render('view', compact('goods'));
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->get('search');
        $goods = new Good();
        $goods = $goods->getSearchResults($search);
        $this->setMeta('Суши весла | Поиск');
        return $this->render('search', compact('goods', 'search'));
        
    }

}