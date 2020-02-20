<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Good extends ActiveRecord
{
    public $search;
    public static function tableName()
    {
        return 'good';
    }

    public function getAllGoods()
    {
        $goods = Yii::$app->cache->get('goods');
        if (!$goods)
        {
            $goods = Good::find()->asArray()->all();
            Yii::$app->cache->set('goods', $goods, 5);
        }
        return $goods;
    }

    public function getGoodsByCategory($id)
    {
        $CatGoods = Good::find()->where(['category' => $id])->asArray()->all();

        return $CatGoods;
    }

    public function getOneGood($name)
    {
        return Good::find()->where(['link_name' => $name])->one();
    }
    public function getSearchResults($search)
    {
        $searchResults = Good::find()->where(['like','name', $search])->asArray()->all();

        return $searchResults;
    }

}