<?php

/**
 * @var $objects Objects[]
 */

use yii\helpers\Url;
use app\models\Objects;

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/objects/index.scss");

$this->title = "Наши объекты"

?>

<div class="objects-index">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-1">
                    <div class="row">
                        <h3>Наши объекты</h3>

                        <? foreach ($objects as $object): ?>
                        <div class="col-md-12 col-xs-12">
                            <a class="item" href="<?=Url::toRoute(['objects/view', 'id' => $object->id])?>">
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
                        </div>
                        <? endforeach;?>
                    </div>


                </div>
            </div>

            <div class="col-md-4">
                <div class="desc-item block-2">
                    <h3>Фильтр</h3>
                    <div class="title"><i class="fa fa-cogs" aria-hidden="true"></i></i>По типу конструкций</div>
                    <ul>
                        <li><a href="<?=Url::toRoute(['objects/index'])?>">Все типы</a></li>
                        <?foreach ((new Objects())->types as $key => $type): ?>
                            <li><a href="<?=Url::toRoute(['objects/index', 'type' => $key])?>"><?=$type?></a></li>
                        <? endforeach?>
                    </ul>
                    <div class="title"><i class="fa fa-check-square" aria-hidden="true"></i>Реализованные объекты</div>
                    <ul>

                        <? foreach ($objects as $object): ?>
                            <li><a href="<?=Url::toRoute(['objects/view', 'id' => $object->id])?>"><?=$object->name?></a></li>
                        <? endforeach;?>
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


