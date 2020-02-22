<?php


namespace app\models;


use SebastianBergmann\CodeCoverage\TestFixture\C;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getCategories()
    {
        return Category::find()->asArray()->all();
    }

    public function findCategoryById($id)
    {
        return Category::find()->where(['cat_name' =>$id])->one();
    }

}