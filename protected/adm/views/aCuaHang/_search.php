<?php
/* @var $this ACuaHangController */
/* @var $model ACuaHang */
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
		<?php echo $form->label($model,'ten'); ?>
		<?php echo $form->textField($model,'ten',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ghi_chu'); ?>
		<?php echo $form->textField($model,'ghi_chu',array('size'=>50,'maxlength'=>50)); ?>
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