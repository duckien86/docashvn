<?php
/* @var $this ProductsController */
/* @var $data WProducts */
?>
<div class="col-md-3 col-xs-6">
    <a href="<?= Yii::app()->controller->createUrl('products/detail', array('id' => $data->id)); ?>" title="">
        <div class="thumbnail">
            <img src="<?= Yii::app()->params->upload_dir_path . $data->thumbnail; ?>" alt="">
        </div>
        <div class="txt_title">
            <?= CHtml::encode($data->name); ?>
        </div>
        <div class="txt_price">
            <span style="color:black">Giá: </span>
            <?php if ($data->price > 0) : ?>
                <span class="price_des"><?= CHtml::encode(number_format($data->price, 0, "", ".")); ?></span>
            <?php else : ?>
                <span class="price_des">Liên hệ</span>
            <?php endif ?>
        </div>

    </a>
</div>