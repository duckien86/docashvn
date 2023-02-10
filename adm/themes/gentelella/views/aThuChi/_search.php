<?php
/* @var $this AThuChiController */
/* @var $model AThuChi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cua_hang_id'); ?>
		<?php echo $form->textField($model,'cua_hang_id',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nhan_vien_id'); ?>
		<?php echo $form->textField($model,'nhan_vien_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'so_tien'); ?>
		<?php echo $form->textField($model,'so_tien'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ghi_chu'); ?>
		<?php echo $form->textField($model,'ghi_chu',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loai_giao_dich'); ?>
		<?php echo $form->textField($model,'loai_giao_dich'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nhom_id'); ?>
		<?php echo $form->textField($model,'nhom_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ngay_tao'); ?>
		<?php echo $form->textField($model,'ngay_tao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trang_thai'); ?>
		<?php echo $form->textField($model,'trang_thai'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->