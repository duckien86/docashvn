<?php
/* @var $this ACuaHangController */
/* @var $model ACuaHang */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acua-hang-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ten'); ?>
		<?php echo $form->textField($model,'ten',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ghi_chu'); ?>
		<?php echo $form->textField($model,'ghi_chu',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ghi_chu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ngay_tao'); ?>
		<?php echo $form->textField($model,'ngay_tao'); ?>
		<?php echo $form->error($model,'ngay_tao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trang_thai'); ?>
		<?php echo $form->textField($model,'trang_thai'); ?>
		<?php echo $form->error($model,'trang_thai'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->