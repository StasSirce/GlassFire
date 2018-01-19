<?php
/**
 * Created by PhpStorm.
 * User: semok
 * Date: 24.01.2017
 * Time: 19:23
 */

namespace app\controllers;

use app\models\Production;
use yii\web\Controller;

class ProductionController extends Controller
{
    public function actionIndex($type = null) {
        $production = Production::find();
        if ($type !== null) {
            $production->where(['type' => $type]);
        }
        return $this->render('index', [
            'production' => $production->all()
        ]);
    }

    public function actionView($id) {
        $production = Production::findOne($id);
        return $this->render('view', [
            'production' => $production
        ]);
    }
}