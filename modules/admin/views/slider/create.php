<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */
$this->title = mb_strtolower($model->name(["ЕД", "ВН"]));

?>
<div class="slider-create">
    <h2>Создать <?= Html::encode($this->title) ?></h2>
    <div class="panel">
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
