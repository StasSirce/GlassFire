<?php

namespace app\controllers;

use app\models\News;
use yii\web\Controller;

class NewsController extends Controller {

    public function actionIndex($category = null) {
        $news = News::find();
        if ($category !== null) {
            $news->where(['category' => $category]);
        }
        return $this->render('index', [
            'news' => $news->all()
        ]);
    }

    public function actionView($id) {
        $news = News::findOne($id);
        return $this->render('view', [
            'news' => $news
        ]);
    }

}