<?php

use yii\helpers\Url;
use app\models\Production;

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/production/index.scss");

$this->title = "Производство";

?>

<div class="production-index">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-1">
                    <h3>Производство</h3>

                    <? foreach ($production as $object): ?>
                        <a class="item" href="<?=Url::toRoute(['production/view', 'id' => $object->id])?>">
                            <div class="image">
                                <img src="<?=count($object->photos) ? $object->photos[0]->photo : ""?>" alt="">
                            </div>
                            <div class="info">
                                <h4><?=$object->name?></h4>
                                <span class="type"><?=$object->types[$object->type]?></span>
                                <div class="text">
                                    <?=$object->short_text;?>
                                </div>
                            </div>
                        </a>
                    <? endforeach;?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="desc-item block-2">
                    <h3>Все статьи</h3>

                    <ul>
                        <?foreach ($production as $object): ?>
                            <li><a href="<?=Url::toRoute(['production/view', 'id' => $object->id])?>"><?=$object->name?></a></li>
                        <? endforeach?>
                    </ul>

                </div>
                <div class="give-catalog block-3">
                    <h3>Получить каталог</h3>
                    <p>Заполните форму и мы сразу же отправим Вам каталог нашей продукции</p>
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




