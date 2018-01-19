<?php
/* @var $this app\components\View */

use app\assets\Owl2Asset;
use yii\helpers\Url;
use app\models\Certificates;
use app\models\Feedback;
use app\models\Catalog;

$this->title = 'Главная страница';

Owl2Asset::register($this);

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/site/index.scss");

$query = Catalog::find();
$query->leftJoin(\app\models\Photos::tableName(), "photos.record = catalog.id and photos.model = '".addslashes(Catalog::className())."'");
$query->groupBy("photos.record");
$query->limit(8);
$query->having("count(photos.record) > 0");
$catalog = $query->all();



?>


<div id="index-page">
    <div id="carousel" class="owl-carousel owl-theme">

        <? foreach ($slider as $slide): ?>
        <div class="slider" style="background: url(<?=$slide->photo?>)">
            <div class="row">
                <div class="col-md-5 col-md-offset-6 col-sm-10 col-sm-offset-1 col-s-12">
                    <div class="item">
                        <h3><?=$slide->name?></h3>
                        <?=$slide->text?>
                    </div>
                </div>
            </div>
        </div>

        <? endforeach;?>


    </div>
    <div class="production">
        <div class="container">
            <h4>Мы производим</h4>
            <div class="row">
                <div class="cube col-md-4">
                    <img src="/images/site/cub1.png" alt="">
                    <h6>Конструкции из
                        алюминиевого профиля</h6>
                    <div class="desc">
                        Уникальное наполнение термостойкими материалами гарантирует безопасность от распространения дыма и огня.
                    </div>
                </div>
                <div class="cube col-md-4">
                    <img src="/images/site/cub2.png" alt="">
                    <h6>Конструкции из стального
                        и нержавеющего профиля</h6>
                    <div class="desc">
                        Специализированная конструкция профиля предотвращает его деформацию в чрезвычайной ситуации.
                    </div>
                </div>
                <div class="cube col-md-4">
                    <img src="/images/site/cub3.png" alt="">
                    <h6>Огнестойкое стекло
                        в нарезку по Вашим размерам</h6>
                    <div class="desc">
                        Многослойные огнеупорные стеклопакеты по индивидуальным эскизам – защита от огня с функциональностью обычного стекла.
                    </div>
                </div>
            </div>
            <div class="buttons">
                <a href="<?=Url::toRoute(['catalog/index'])?>" class="all-item">Полный каталог продукции</a>
                <a href="<?=Url::toRoute(['objects/index'])?>" class="our-object">Наши объекты</a>
            </div>
        </div>
    </div>
    <div class="documents">
        <div class="container">
            <h3>Наши сертификаты</h3>
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div id="carousel_doc" class="owl-carousel">

                        <? foreach (Certificates::find()->all() as $certificate): ?>
                        <div class="item" data-url="<?=$certificate->photo?>">
                            <img src="<?=$certificate->thumbnail?>" alt="">
                        </div>
                        <? endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="consultation">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 hidden-lg hidden-md">
                    <div class="free-consultation">
                        <h3>Бесплатная консультация</h3>
                        <div class="text">
                            Оставьте Ваш номер телефона и мы ответим на любой
                            интересующий Вас вопрос, а также, при желании:
                        </div>
                        <span><i class="fa fa-check" aria-hidden="true"></i>Расскажем о преимуществах огнестойкого остекления</span>
                        <span><i class="fa fa-check" aria-hidden="true"></i>Подберем самое выгодное решение специально для Вас</span>
                        <span><i class="fa fa-check" aria-hidden="true"></i>Запланируем бесплатный выезд специалиста</span>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2">
                    <form action="post" class="application" id="contact-form">
                        <input type="text" name="name" placeholder="Ваше имя" class="name" required>
                        <input type="text" name="phone" placeholder="Ваш номер телефона" class="phone" required>
                        <input type="submit" class="send" value="Отправить заявку">
                    </form>
                </div>
                <div class="col-md-5 hidden-xs hidden-sm">
                    <div class="free-consultation">
                        <h3>Бесплатная консультация</h3>
                        <div class="text">
                            Оставьте Ваш номер телефона и мы ответим на любой
                            интересующий Вас вопрос, а также, при желании:
                        </div>
                        <span><i class="fa fa-check" aria-hidden="true"></i>Расскажем о преимуществах огнестойкого остекления</span>
                        <span><i class="fa fa-check" aria-hidden="true"></i>Подберем самое выгодное решение специально для Вас</span>
                        <span><i class="fa fa-check" aria-hidden="true"></i>Запланируем бесплатный выезд специалиста</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-object">
        <div class="container">

            <h3>Наши объекты</h3>
            <div class="row">

                <? foreach ($catalog as $item):?>

                <div class="col-md-3 col-xs-6">
                    <div class="info" style="background-image: url('<?= count($item->photos) ? $item->photos[0]->photo : ""?>')">
                        <div class="content">
                            <h4><?=$item->name?></h4>
                            <a  href="<?=Url::toRoute(['catalog/view', 'id' => $item->id])?>"  class="more">Подробнее</a>
                        </div>
                    </div>
                </div>
                <? endforeach;?>

            </div>
            <div class="next">
                <a href="<?=Url::toRoute(['/objects/index'])?>" class="go">Перейти к разделу</a>
            </div>


        </div>
    </div>
    <div class="clients">
        <div class="container">
            <h3>Наши клиенты</h3>
            <div id="carousel_clients" class="owl-carousel">
                <? foreach(Feedback::find()->all() as $feedback): ?>
                <div class="client">
                    <img src="<?=$feedback->photo?>" alt="">
                    <div class="name"><?=$feedback->name?></div>
                    <div class="text"><?=$feedback->text?></div>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
</div>



