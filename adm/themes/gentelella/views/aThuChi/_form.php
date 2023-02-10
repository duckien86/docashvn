<?php
/* @var $this AThuChiController */
/* @var $model AThuChi */
/* @var $form CActiveForm */
?>

<div class="container-fluid">
	<div class="form">

		<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
			'id' => 'athu-chi-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation' => true,
		)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="form-group">
			<?php echo $form->labelEx($model, 'so_tien'); ?>
			<?php echo $form->textField($model, 'so_tien'); ?>
			<?php echo $form->error($model, 'so_tien'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model, 'ghi_chu'); ?>
			<?php echo $form->textField($model, 'ghi_chu', array('size' => 0, 'maxlength' => 0)); ?>
			<?php echo $form->error($model, 'ghi_chu'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model, 'nhom_id'); ?>
			<?php echo $form->textField($model, 'nhom_id'); ?>
			<?php echo $form->error($model, 'nhom_id'); ?>
		</div>

		<div class="form-group buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->
</div>