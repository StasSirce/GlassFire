<?php

use yii\helpers\Url;
use app\models\News;

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/news/index.scss");

$this->title = "Новости";

?>

<div class="news-index">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-1">
                    <h3>Наши новости</h3>

                    <? foreach ($news as $new): ?>
                        <a class="item" href="<?=Url::toRoute(['news/view', 'id' => $new->id])?>">
                            <div class="image">
                                <img src="<?=count($new->photos) ? $new->photos[0]->photo : ""?>" alt="">
                            </div>
                            <div class="info">
                                <h4><?=$new->name?></h4>
                                <span class="type"><?=$new->categories[$new->category]?></span>
                                <div class="text">
                                    <?=$new->short_text;?>
                                </div>
                            </div>
                        </a>
                    <? endforeach;?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar ">
                    <div class="block-2 desc-item">
                        <h3>Новости</h3>

                        <? foreach ((new News())->categories as $key => $value):?>
                            <div class="title"><?=$value?></div>
                            <ul>
                                <? foreach (News::find()->limit(5)->all() as $article): ?>
                                    <? if($article->category != $key) continue ?>

                                    <li><a href="<?=Url::toRoute(['news/view', 'id' => $article->id])?>"><?= $article->name?></a></li>

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



