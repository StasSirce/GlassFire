<?php

namespace app\modules\admin;
use \yii\base\Module;
use \app\models;

class Admin extends Module {

    // Контроллеры, которые могут использоваться в админке
    public $controllers = [

        "default" => [
            "url" => ["/admin"],
            "title" => "Главная",
            "icon" => "icon-home",
        ],

        "meta-tags" => [
            "url" => ["/admin/meta-tags"],
            "title" => "Мета-теги"
        ],

        "users" => [
            "url" => ["/admin/users/"],
            "title" => "Пользователи",
            "icon" => "fa fa-group",
            "badge" => [
                "model" => 'app\models\Users',
                "condition" => ["status" => 1]
            ]
        ],

        "settings" => [
            "url" => ["/admin/settings/"],
            "title" => "Настройки",
            "icon" => "fa fa-group",
        ],

        "objects" => [
            "url" => ["/admin/objects/"],
            "title" => "Объекты",
            "icon" => "fa fa-building-o",
        ],

        "certificates" => [
            "url" => ["/admin/certificates/"],
            "title" => "Сертификаты",
            "icon" => "fa fa-file",
        ],

        "feedback" => [
            "url" => ["/admin/feedback/"],
            "title" => "Отзывы",
            "icon" => "fa fa-comment",
        ],
        "news" => [
            "url" => ["/admin/news/"],
            "title" => "Новости",
            "icon" => "fa fa-comment",
        ],
        "catalog" => [
            "url" => ["/admin/catalog/"],
            "title" => "Каталог",
            "icon" => "fa fa-comment",
        ],
        "production" => [
            "url" => ["/admin/production/"],
            "title" => "Производство",
            "icon" => "fa fa-comment",
        ],
        "slider" => [
            "url" => ["/admin/slider/"],
            "title" => "Слайдер",
            "icon" => "fa fa-comment",
        ],

    ];

    /**
     * @var array
     *
     * Пункты меню для отображения в layout. Формат:
     *
     * "default" => [
     *      "items" => ["card", "users"], - перечисление контроллеров из $this->controllers
     *      "icon" => "glyphicon glyphicon-off", - класс иконки, который получит категория
     *      "title" => "Пользователи" - название категории
     * ],
     *
     * Можно просто указать "users" для отображения контроллера без категории
     */
    public $menu = [
        /*"default" => [
            "items" => ["users", "users"],
            "icon" => "glyphicon glyphicon-off",
            "title" => "Пользователи"
        ],*/

        "default",
        "objects",
        "certificates",
        "feedback",
        "users",
        "news",
        "catalog",
        "production",
        "slider"

    ];
}