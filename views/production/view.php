<?php

use yii\helpers\Url;
use app\models\Production;

use app\assets\Owl2Asset;

Owl2Asset::register($this);

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/production/view.scss");
$this->registerJsFile("/js/production/view.js");


$this->title = "Производство";

?>


<div class="production-view">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-1">
                    <h3><?=$production->name?></h3>

                    <div class="images">
                        <? foreach ($production->photos as $photo): ?>
                            <div class="image">
                                <img src="<?=$photo->photo?>" alt="">
                            </div>
                        <? endforeach;?>
                    </div>

                    <div class="description">
                        <?=$production->full_text?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="desc-item block-2">
                    <h3>Все статьи</h3>

                    <ul>
                        <?foreach (Production::find()->all() as $object): ?>
                            <li><a href="<?=Url::toRoute(['production/view', 'id' => $object->id])?>"><?=$object->name?></a></li>
                        <? endforeach?>
                    </ul>

                </div>

                <div class="give-catalog block-3">
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



