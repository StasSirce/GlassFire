<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="feedback-index">

    <h2><?= Html::encode($title) ?></h2>

    <div class="panel">
        <div class="panel-body">
            <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped table-action'
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'photo:image',
                    'text:ntext',
                    ['class' => 'app\components\make\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
