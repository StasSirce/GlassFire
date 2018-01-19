<?php

namespace app\controllers;
use app\models\Catalog;

use yii\web\Controller;

class CatalogController extends Controller {

    public function actionIndex($category = null) {
        $catalog =  Catalog::find();

        return $this->render('index', [
            'catalog' => $catalog->all()
        ]);
    }

    public function actionView($id) {
        $catalog =  Catalog::findOne($id);
        return $this->render('view', [
            'catalog' => $catalog
        ]);
    }

}
