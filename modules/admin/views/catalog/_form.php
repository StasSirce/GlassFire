<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php if (count($model->errors)): ?>
        <div class="alert alert-danger">
            <?php foreach($model->errors as $attr) echo implode("<br>", $attr); ?>
        </div>
    <? endif;?>
    <?php $form = ActiveForm::begin(['options' => ['class' => 'pjax-form', 'enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'category')->dropDownList($model->categories) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'full_text')->textarea(['class' => 'cke-editor']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>