<?php

use app\widgets\MenuWidget;
use yii\helpers\Url;

?>
<h2 style="text-align: center">Результаты поиска по запросу: <?=$search?></h2>
<div class="container">

    <div class="row justify-content-center">

        <?php
        if ($goods){
        foreach ($goods as $good):?>
            <div class="col-4">
                <div class="product">
                    <div class="product-img">
                        <img src="/img/<?=$good['img']?>" alt="Сет Филамикс">
                    </div>
                    <div class="product-name"><?=$good['name']?></div>
                    <div class="product-descr">Состав: <?=$good['composition']?></div>
                    <div class="product-price">Цена: <?=$good['price']?> рублей</div>
                    <div class="product-buttons">
                        <button type="button" class="product-button__add btn btn-success">Заказать</button>
                        <a href="<?=Url::to(['good/index', 'name' => $good['link_name']])?>" type="button" class="product-button__more btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach;}else{
            echo 'Ничего не найдено';}
        ?>

    </div>
</div>