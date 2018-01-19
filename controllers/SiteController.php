<?php

namespace app\controllers;

use Yii;
use app\components\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Settings;
use app\models\Slider;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['admin'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],

        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',

            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'metrika' => [
                'class' => 'app\components\metrika\MetrikaAction',
                'token' => Settings::get("yandex_token"),
                'counter' => Settings::get("yandex_counter")
            ],
        ];
    }

    public function actionIndex() {
        $slider = Slider::find();
        return $this->render('index', [
            'slider' => $slider->all()
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionContacts() {
        return $this->render('contacts');
    }

    public function actionObjects() {
        return Yii::$app->runAction('admin/objects/index', []);
    }

    public function actionCatalog() {
        return Yii::$app->runAction('admin/catalog/index', []);
    }

    public function actionAdmin() {
        return Yii::$app->runAction('admin/default/index', []);
    }

    public function actionMail($name,$phone, $message = "", $email= "не указан"){
        mail("office@glassfire.co","Сообщение от glassfire","Имя: $name\nТелефон:$phone\nСообщение: $message\nE-mail: $email");
    }




}
