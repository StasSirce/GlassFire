<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = mb_strtolower($model->name(["ЕД", "ВН"]));

?>
<div class="news-update">
    <h2>Редактировать <?= Html::encode($this->title) ?> #<strong><?= $model->id?></strong></h2>
    <div class="panel">
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
