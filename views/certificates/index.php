<?php

use yii\helpers\Url;
use app\models\Certificates;

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/certificates/index.scss");
$this->registerJsFile("/js/certificates/view.js");

$this->title = "Сертификаты";

?>

<div class="certificates-index">
    <div class="container">
        <div class="row">
            <div class="col-md-12 left-col block-1">
                <div class="row">
                    <? foreach ($certificates as $certificat): ?>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="item" data-url="<?=$certificat->photo?>">
                                <img src="<?=$certificat->thumbnail?>" alt="">
                                <div class="title"><?=$certificat->name?></div>

                            </div>
                        </div>
                    <? endforeach;?>

                </div>


            </div>

        </div>
    </div>
</div>
