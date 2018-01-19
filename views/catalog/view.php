<?php

use app\assets\Owl2Asset;
use app\models\Catalog;
use yii\helpers\Url;

Owl2Asset::register($this);

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/catalog/view.scss");
$this->registerJsFile("/js/catalog/view.js");

$this->title = $catalog->name;

$categories = new Catalog();

?>

<div class="catalog-view">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page card">
                    <h3><?= $catalog->name ?></h3>
                    <div id="carousel" class="owl-carousel owl-theme">
                        <? foreach ($catalog->photos as $photo): ?>
                            <div class="item">
                                <img src="<?=$photo->photo?>" alt="">
                            </div>
                        <? endforeach; ?>

                    </div>

                    <?= $catalog->full_text ?>

                    <form action="" class="calculate-price" >
                        <h3>Рассчитать стоимость</h3>
                        <div class="text">Каждый заказ требует предварительного расчета. С помощью данной формы Вы можете сформировать индивидуальную заявку на рассчет стоимости. Это очень удобно и экономит Ваше время, необходимое на описание конфигураций изделий менеджеру по телефону.</div>
                        <input type="text" name="name" placeholder="Ваше имя" class="name">
                        <input type="text" name="phone" placeholder="Ваш номер телефона" class="phone">
                        <input type="text" name="email" placeholder="Ваш email" class="email">
                        <textarea name="message" class="message" placeholder="Сообщение"></textarea>
                        <input type="submit" class="send" value="Отправить заявку">


                    </form>
                </div>


            </div>

            <div class="col-md-4">
                <div class="sidebar card">
                    <h3>Продукции</h3>
                    <? foreach ($categories->categories as $key => $value):?>
                        <div class="title"><i class="fa <?=$categories->category_icons[$key]?>" aria-hidden="true"></i><?=$value?></div>
                    <ul>
                        <? foreach (Catalog::find()->all() as $item): ?>
                            <? if($item->category != $key) continue ?>

                                <li><a href="<?=Url::toRoute(['catalog/view', 'id' => $item->id])?>"><?= $item->name?></a></li>

                        <? endforeach;?>
                    </ul>
                    <? endforeach;?>

                </div>

                <div class="subscribe card">
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


