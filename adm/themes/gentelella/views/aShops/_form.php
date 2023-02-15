<?php
/* @var $this AShopsController */
/* @var $model AShops */
/* @var $form CActiveForm */
?>


<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'id' => 'ashops-form',
	'enableAjaxValidation' => true,
	'htmlOptions' => ['class' => 'form-horizontal form-label-left'],
)); ?>


<?php echo $form->errorSummary($model); ?>

<!-- name -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'name', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'name', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'name'); ?>
</div>

<!-- note -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'note', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'note', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'note'); ?>
</div>

<!-- owner -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'owner', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'owner', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'owner'); ?>
</div>

<div class="form-group buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Lưu lại', ['class' => 'btn btn-primary']); ?>
</div>

<?php $this->endWidget(); ?>