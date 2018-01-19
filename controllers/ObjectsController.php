<?php

namespace app\controllers;

use app\models\Objects;
use yii\web\Controller;

class ObjectsController extends Controller {

    /**
     * @param null $type
     * @return string
     */
    public function actionIndex($type = null) {

        $objects = Objects::find();
        if ($type !== null) {
            $objects->where(['type' => $type]);
        }

        return $this->render('index', [
            'objects' => $objects->all()
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id) {
        $object = Objects::findOne($id);
        return $this->render('view', [
            'object' => $object
        ]);
    }

    public function actionTypes($type = null) {

        $objects = Objects::find();
        if ($type !== null) {
            $objects->where(['type' => $type]);
        }

        return $this->render('types', [
            'objects' => $objects->all()
        ]);
    }

}
