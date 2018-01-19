<?php

use yii\helpers\Url;
use app\models\Catalog;

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/catalog/index.scss");

$this->title = "Каталог";

$categories = new Catalog();

?>

<div class="catalog-index">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class=" left-col block-1">

                    <? foreach ($categories->categories as $key => $value):?>
                        <? if($key==2) continue ?>
                        <div class="row">
                            <h3><?=$value?></h3>
                            <? foreach ($catalog as $item): ?>
                                <? if($item->category != $key) continue ?>
                                <div class="col-md-4 col-xs-6">
                                    <div class="item">
                                        <img src="<?=count($item->photos) ? $item->photos[0]->photo : ""?>" alt="">
                                        <div class="title"><?= $item->name?></div>
                                        <a href="<?=Url::toRoute(['catalog/view', 'id' => $item->id])?>">Подробнее</a>
                                    </div>
                                </div>
                            <? endforeach;?>
                        </div>
                    <? endforeach;?>


                    <div class="and-buy">
                        <a href="<?=Url::toRoute(['catalog/view', 'id' => 3])?>">Также у нас Вы можете приобрести огнестойкое стекло (стеклопакеты) в нарезку</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="sidebar ">
                    <div class="block-2 desc-item">
                        <h3>Продукция</h3>

                        <? foreach ($categories->categories as $key => $value):?>
                            <div class="title"><i class="fa <?=$categories->category_icons[$key]?>" aria-hidden="true"></i><?=$value?></div>
                                <ul>
                                    <? foreach ($catalog as $item): ?>
                                        <? if($item->category != $key) continue ?>

                                            <li><a href="<?=Url::toRoute(['catalog/view', 'id' => $item->id])?>"><?= $item->name?></a></li>

                                    <? endforeach;?>
                                </ul>
                        <? endforeach;?>
                    </div>

                    <div class="block-3 give-catalog">
                        <h3>Получить каталог</h3>
                        <p>Заполните форму и мы сразу же отправим Вам каталог нашей продукции</p>
                        <form action="" id="contact-form">
                            <input type="text" required name="name" placeholder="Ваше имя" class="name">
                            <input type="text" required name="phone" placeholder="Ваш номер телефона" class="phone">
                            <input type="submit" class="send" value="Отправить заявку">

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>