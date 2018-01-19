<?php

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/site/contacts.scss");

$this->title = "Контакты";

?>

<div class="contacts-index">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <h3>Контакты</h3>
                            <div class="contacts">
                                <span><i class="fa fa-map-marker"></i>   119002, Москва г, Николопесковский Б.<br> пер, дом № 13, оф. помещение 1 кабинет 5</span>
                                <span>
                                    <i class="fa fa-phone"></i>  8 (903) 796-96-41
                                </span>
                                <span> <i class="fa fa-phone"></i>8 (495) 803-29-68</span>

                                <span>
                        <i class="fa fa-envelope"></i>  office@glassfire.co
                    </span>
                                <span>
                         <i class="fa fa-vk"></i>  glassfireru
                    </span>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <h3>Есть вопрос?</h3>
                            <div class="title-text">
                                Заполните форму и мы свяжемся с вами<br> как можно скорее
                            </div>
                            <form action="post" class="application" id="contact-form">
                                <input type="text" name="name" placeholder="Ваше имя" class="name" required>
                                <input type="text" name="phone" placeholder="Ваш телефона" class="phone" required>
                                <input type="submit" class="send" value="Перезвоните мне">
                            </form>
                         </div>
                    </div>

                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=sGWF3GX0b19PehKGdblCatq6awHNvbdK&amp;height=437&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
