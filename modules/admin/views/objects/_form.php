<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Objects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objects-form">

    <?php if (count($model->errors)): ?>
        <div class="alert alert-danger">
            <?php foreach($model->errors as $attr) echo implode("<br>", $attr); ?>
        </div>
    <? endif;?>
    <?php $form = ActiveForm::begin(['options' => ['class' => 'pjax-form', 'enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'type')->dropDownList($model->types) ?>
    <?= $form->field($model, 'short_text')->textarea(['maxlength' => true]) ?>
    <?= $form->field($model, 'full_text')->textarea(['rows' => 6, 'class' => 'cke-editor']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>