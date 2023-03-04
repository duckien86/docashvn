<?php
/* @var $this ATransactionsController */
/* @var $model ATransactions */
/* @var $form CActiveForm */
?>


<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'id' => 'atransactions-form',
	'enableAjaxValidation' => true,
	'htmlOptions' => ['class' => 'form-horizontal form-label-left'],
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


<!-- create_by -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'create_by', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'create_by', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'create_by'); ?>
</div>

<!-- shop_id -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'shop_id', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'shop_id', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'shop_id'); ?>
</div>

<!-- customer -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'customer', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'customer', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'customer'); ?>
</div>

<!-- amount -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'amount', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'amount', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'amount'); ?>
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

<!-- type -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'type', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'type', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'type'); ?>
</div>

<!-- group_id -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'group_id', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'group_id', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'group_id'); ?>
</div>

<!-- create_date -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'create_date', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'create_date', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'create_date'); ?>
</div>

<!-- ref_id -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'ref_id', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'ref_id', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'ref_id'); ?>
</div>

<!-- status -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'status', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'status', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'status'); ?>
</div>

<!-- extra_param_1 -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'extra_param_1', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'extra_param_1', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'extra_param_1'); ?>
</div>

<!-- extra_param_2 -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'extra_param_2', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'extra_param_2', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'extra_param_2'); ?>
</div>

<!-- extra_param_3 -->
<div class="form-group">
	<?php echo $form->labelEx($model, 'extra_param_3', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'extra_param_3', array(
			'class' => 'form-control',
		)); ?>
	</div>
	<?php echo $form->error($model, 'extra_param_3'); ?>
</div>
<div class="form-group buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Lưu lại', ['class' => 'btn btn-primary']); ?>
</div>

<?php $this->endWidget(); ?>