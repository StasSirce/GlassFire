<?php
/**
 * Created by PhpStorm.
 * User: MikeFinch
 * Date: 21.12.2016
 * Time: 19:16
 *
 * @var $model \app\models\Photos;
 *
 */

use yii\bootstrap\Html;

?>

<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
    <div class="t-center m-b-10 m-t-20">
        <img src="<?=$model->photo?>" alt="" class="img-responsive dis-inline-b m-b-10">
        <?=Html::a("Удалить", ["/admin/photos/delete", 'id' => $model->id], ['data-confirm' => 'Вы действительно хотите удалить эту фотогарфию?', 'data-method' => 'post', 'data-pjax' => '0', 'class' => 'btn btn-danger m-r-0'])?>
    </div>
</div>