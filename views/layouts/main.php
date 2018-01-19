<?php


/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\models\Settings;
use yii\helpers\Url;

AppAsset::register($this);
$this->registerJsFile("/js/site/main.js");

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" type="image/png" href="/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="application/javascript"></script>
    <?  ?>
    <?php $this->head() ?>
</head>
<body>


<?php $this->beginBody();?>

<header>
    <div class="row-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="logo">
                                <a href="/" class="logo"><img src="/images/logo.png" alt=""></a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-5">
                            <div class="description">
                                Изготовление огнестойких светопрозрачных
                                конструкций на основе алюминиевых
                                профилей и нержавеющей стали
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5">
                    <div class="row">
                        <div class="col-sm-12 col-md-7 hidden-xs hidden-sm">
                            <div class="contacts">
                                <span class="address"><i class="fa fa-map-marker" aria-hidden="true"></i>Москва, г, Николопесковский Б. пер, дом № 13</span>
                                <span class="mail"><i class="fa fa-envelope" aria-hidden="true"></i> office@glassfire.co</span>
                                <span class="vk"><i class="fa fa-vk" aria-hidden="true"></i>glassfireru</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="call">
                                <i class="fa fa-phone" aria-hidden="true"></i>8 (495) 803-29-68
                                <div class="order-call">Заказать звонок</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="menu">
        <div class="bars">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="cross">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row-mobile">
                <ul class="main-menu">
                    <li class="main-li">
                        <div class="title">О компании<i class="fa fa-sort-desc" aria-hidden="true"></i></div>
                        <ul class="menu-drop">
                            <li><a href="<?=Url::toRoute('/about')?>">О нас</a></li>
                            <li><a href="<?=Url::toRoute(['production/view', 'id' => 1])?>">Производство</a></li>
                            <li><a href="<?=Url::toRoute('certificates/index')?>">Сертификаты </a></li>
                            <li><a href="<?=Url::toRoute('news/index')?>">Новости</a></li>
                        </ul>
                    </li>
                    <li class="main-li">
                        <a href="<?=Url::toRoute('catalog/index')?>">Продукция</a>
                    </li>
                    <li class="main-li">
                        <div class="title">Наши объекты<i class="fa fa-sort-desc" aria-hidden="true"></i></div>
                        <ul class="menu-drop">
                            <li><a href="<?=Url::toRoute('objects/types')?>">По типу конструкции</a></li>
                            <li><a href="<?=Url::toRoute('objects/index')?>">Реализованные</a></li>
                        </ul>
                    </li>
                    <li class="main-li">
                        <a href="<?=Url::toRoute('site/contacts')?>">Контакты</a>
                    </li>
                    <li class="main-li">
                        <a href="<?=Url::toRoute('profile/index')?>">Личный кабинет<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main>
    <?= $content ?>
</main>

<div class="modal-window">
    <div class="wrapper">
        <div class="image">
            <div class="left">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
            <img src="" alt="">
            <div class="right">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
        </div>

        <div class="right"></div>
    </div>
</div>

<div class="modal-call">
    <div class="wrapper">

            <form id="callback-form">
                <h3>Есть вопрос?</h3>
                <div class="title-text">
                    Заполните форму и мы свяжемся с вами<br> как можно скорее
                </div>
                <input type="text" name="name" placeholder="Ваше имя" class="name" required>
                <input type="text" name="phone" placeholder="Ваш номер телефона" class="phone" required>
                <input type="submit" class="send" value="Перезвоните мне">
            </form>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="logo">
                            <img src="/images/logo2.png" alt="">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-5">
                        <div class="description">
                            Использование огнеупорных конструкций на 80% уменьшает ущерб, нанесённый огнём, дымом, а также продуктами горения людям и имуществу.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="row">
                    <div class="col-xs-7 col-md-7">
                        <a href="<?=Url::toRoute(['/contacts'])?>" class="map-drive">Карта проезда</a>
                    </div>
                    <div class="col-xs-5 col-md-5">
                        <div class="contacts">
                            <span class="phone"> <i class="fa fa-phone" aria-hidden="true"></i>8 (495) 803-29-68</span>
                            <span class="mail"><i class="fa fa-envelope" aria-hidden="true"></i>office@glassfire.co</span>
                            <span class="address"><i class="fa fa-map-marker" aria-hidden="true"></i>г. Москва, г, Николопесковский Б. пер, дом № 13</span>
                            <span class="vk"><i class="fa fa-vk" aria-hidden="true"></i>glassfireru</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <i class="fa fa-copyright" aria-hidden="true"></i> <?= date("Y")?>г. ООО “Glass-Fire”, все права защищены.
        </div>

    </div>
</footer>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter<?=Settings::get("yandex_counter");?> = new Ya.Metrika({
                    id:<?=Settings::get("yandex_counter");?>,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/34484650" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
