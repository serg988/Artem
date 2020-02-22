<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Good;
use app\models\Order;
use Yii;
use yii\web\Application;
use yii\web\Controller;

class CartController extends AppController
{
    public function actionOpen()
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->renderPartial('cart',  compact('session'));
    }
    public function actionAdd($name)
    {
        $good = new Good();
        $good = $good->getOneGood($name);
        $session = Yii::$app->session;
        $session->open();
//        $session->remove('cart');
        $cart = new Cart;
        $cart->addToCart($good);
        return $this->renderPartial('cart', compact('good', 'session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalSum');
        return $this->render('cart', compact('session'));
    }

    public function actionDeleteGood($id)
    {
        $good = new Good();
//        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        return $this->renderPartial('cart', compact('good', 'session'));
    }

    public function actionCartQty()
    {
        $session = Yii::$app->session;
        $session->open();
        return $session['cart.totalQuantity'];
    }

    public function actionOrder()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if ($order->load(Yii::$app->request->post()))
        {
            $order->date = date('Y-m-d H:i:s' );
            $order->sum = $session['cart.totalSum'];
            if ($order->save())
            {
                Yii::$app->mailer->compose()->
                    setFrom(['serg98888@inbox.ru' => 'Суши весла'])->
                    setTo('serg988@gmail.com')->
                    setSubject('Ваш заказ принят!')->
                    send();

                $session->remove('cart');
                $session->remove('cart.totalQuantity');
                $session->remove('cart.totalSum');
                return $this->render('success');
            }
        }
        $this->layout = 'empty-layout';
        return $this->render('order', compact('session', 'order'));
    }
}