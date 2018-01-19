<?php

use yii\helpers\Url;
use app\models\Objects;

$this->registerCssFile("/css/ui.css");
$this->registerScssFile("/css/objects/types.scss");

$this->title = "Каталог";

?>

<div class="objects-types">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class=" left-col block-1">
                    <div class="row">
                        <? foreach ($objects as $object): ?>
                            <div class="col-md-4 col-xs-6">
                                <div class="item">
                                    <img src="<?=count($object->photos) ? $object->photos[0]->photo : ""?>" alt="">
                                    <div class="title"><?=$object->types[$object->type]?></div>
                                    <a href="<?=Url::toRoute(['objects/view', 'id' => $object->id])?>">Подробнее</a>
                                </div>
                            </div>
                        <? endforeach;?>

                    </div>


                </div>
            </div>


        </div>
    </div>
</div>