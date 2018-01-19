<?php
/**
 * Created by PhpStorm.
 * User: Mike Finch
 * Date: 23.01.2017
 * Time: 4:42
 *
 * @var $this app\components\View
 */

use app\models\Objects;
use yii\helpers\Url;
use app\assets\Owl2Asset;

Owl2Asset::register($this);

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/objects/view.scss");

$this->registerJsFile("/js/objects/view.js");

$this->title = $object->name;

?>

<div class="objects-view">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-1">
                    <h3><?=$object->name?></h3>

                    <div class="images">
                        <? foreach ($object->photos as $photo): ?>
                            <div class="image">
                                <img src="<?=$photo->photo?>" alt="">
                            </div>
                        <? endforeach;?>
                    </div>

                    <div class="description">
                        <?=$object->full_text?>
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

                        <? foreach (Objects::find()->all() as $object): ?>
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

