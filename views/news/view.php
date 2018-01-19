<?php

use yii\helpers\Url;
use app\models\News;

use app\assets\Owl2Asset;

Owl2Asset::register($this);

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/news/view.scss");
$this->registerJsFile("/js/news/view.js");

$categories = new News();

?>


<div class="news-view">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-1">
                    <h3><?=$news->name?></h3>

                    <div class="images">
                        <? foreach ($news->photos as $photo): ?>
                            <div class="image">
                                <img src="<?=$photo->photo?>" alt="">
                            </div>
                        <? endforeach;?>
                    </div>

                    <div class="description">
                        <?=$news->full_text?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="sidebar ">
                    <div class="block-2 desc-item">
                        <h3>Новости</h3>

                        <? foreach ($categories->categories as $key => $value):?>
                            <div class="title"><?=$value?></div>
                            <ul>
                                <? foreach (News::find()->limit(5) as $article): ?>
                                    <? if($article->category != $key) continue ?>

                                    <li><a href="<?=Url::toRoute(['news/view', 'id' => $article->id])?>"><?= $article->name?></a></li>

                                <? endforeach;?>
                            </ul>
                        <? endforeach;?>
                    </div>

                    <div class="block-3 give-catalog">
                        <h3>Получить каталог</h3>
                        <p>Заполните форму и мы сразу жеотправим Вам каталог нашей продукции</p>
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



