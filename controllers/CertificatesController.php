<?php

namespace app\controllers;

use app\models\Certificates;
use yii\web\Controller;

class CertificatesController extends Controller {

    public function actionIndex() {

        $certificates = Certificates::find();

        return $this->render('index', [
            'certificates' => $certificates->all()
        ]);
    }



}
