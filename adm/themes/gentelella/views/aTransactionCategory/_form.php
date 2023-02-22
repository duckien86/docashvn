<?php
/* @var $this ATransactionCategoryController */
/* @var $model ATransactionCategory */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'atransaction-category-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => ['class' => 'form-horizontal form-label-left'],
	)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<!-- name --> 
	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $form->textField($model,'name',array (
  'class' => 'form-control',
)); ?>
		</div>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<!-- in_out --> 
	<div class="form-group">
		<?php echo $form->labelEx($model,'in_out',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $form->textField($model,'in_out',array (
  'class' => 'form-control',
)); ?>
		</div>
		<?php echo $form->error($model,'in_out'); ?>
	</div>

	<!-- code --> 
	<div class="form-group">
		<?php echo $form->labelEx($model,'code',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $form->textField($model,'code',array (
  'class' => 'form-control',
)); ?>
		</div>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<!-- sort_index --> 
	<div class="form-group">
		<?php echo $form->labelEx($model,'sort_index',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $form->textField($model,'sort_index',array (
  'class' => 'form-control',
)); ?>
		</div>
		<?php echo $form->error($model,'sort_index'); ?>
	</div>

	<!-- status --> 
	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $form->textField($model,'status',array (
  'class' => 'form-control',
)); ?>
		</div>
		<?php echo $form->error($model,'status'); ?>
	</div>
<div class="form-group buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Lưu lại',['class'=>'btn btn-primary']); ?>
</div>

<?php $this->endWidget(); ?>
