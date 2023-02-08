<?php
/* @var $this AThuChiController */
/* @var $model AThuChi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'athu-chi-form',
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
		<?php echo $form->labelEx($model,'cua_hang_id'); ?>
		<?php echo $form->textField($model,'cua_hang_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cua_hang_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nhan_vien_id'); ?>
		<?php echo $form->textField($model,'nhan_vien_id'); ?>
		<?php echo $form->error($model,'nhan_vien_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'so_tien'); ?>
		<?php echo $form->textField($model,'so_tien'); ?>
		<?php echo $form->error($model,'so_tien'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ghi_chu'); ?>
		<?php echo $form->textField($model,'ghi_chu',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'ghi_chu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loai_giao_dich'); ?>
		<?php echo $form->textField($model,'loai_giao_dich'); ?>
		<?php echo $form->error($model,'loai_giao_dich'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nhom_id'); ?>
		<?php echo $form->textField($model,'nhom_id'); ?>
		<?php echo $form->error($model,'nhom_id'); ?>
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