<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use app\models\Objects;

/* @var $this yii\web\View */
/* @var $model app\models\Objects */

$this->title = $model->name(["ЕД", "ИМ"]);


$itemsProvider = new \yii\data\ArrayDataProvider([
    'allModels' => $model->photos
]);

?>
<div class="objects-view">

    <h2><?= Html::encode($this->title) ?> #<strong><?=$model->id?></strong></h2>

    <div class="panel">
        <div class="panel-body">
            <div class="pull-right t-right">
                Дата создания: <strong><?=  $model->getCreateDate("d MMMM y H:mm");?></strong> <br>
                <a href="<?= Url::toRoute(['log', 'id' => $model->id])?>">История изменений</a>
            </div>

            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент',
                'method' => 'post',
                'pjax' => '0',
                ],
            ]) ?>

            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => "table table-striped"],
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'type',
                        'value' => $model->types[$model->type]
                    ],
                    'name',
                    'short_text',
                    'full_text:raw',
                ],
            ]) ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            <h3>Фотографии</h3>
        </div>

        <div class="panel-body">

            <a class="btn btn-primary" href="<?=Url::toRoute(['photos/create', 'class' => Objects::className(), 'record' => $model->id])?>">Добавить</a>

            <?= ListView::widget([
                'dataProvider' => $itemsProvider,
                'itemView' => '../photos/_list',
                'layout' => "{summary}\n<div class='row'>{items}</div>\n{pager}"
            ]);

            ?>

        </div>
    </div>
</div>
