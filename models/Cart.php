<?php


namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($good)
    {
        if (isset($_SESSION['cart'][$good->id]))
        {
            $_SESSION['cart'][$good->id]['goodQuantity'] +=1;
        } else
        {
            $_SESSION['cart'][$good->id]=
                [
                    'goodQuantity' => 1,
                    'id' => $good['id'],
                    'name' => $good['name'],
                    'price' => $good['price'],
                    'img' => $good['img'],
                ];
        }
        $_SESSION['cart.totalQuantity'] = isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity'] + 1 : 1;
        $_SESSION['cart.totalSum'] = isset($_SESSION['cart.totalSum']) ? $_SESSION['cart.totalSum'] + $good['price'] : $good['price'];
    }
    public function recalc($id)
    {
        if (!isset($_SESSION['cart'][$id])) return false;
        $qtyMinus = $_SESSION['cart'][$id]['goodQuantity'];
        $sumMinus = $_SESSION['cart'][$id]['goodQuantity'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.totalQuantity'] -= $qtyMinus;
        $_SESSION['cart.totalSum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
}