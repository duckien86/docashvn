<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */
/* @var $form CActiveForm */
?>
<div class="search-form" style="padding-bottom:0px;margin-bottom:10px">

	<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
		'htmlOptions' => ['class' => 'form-horizontal form-label'],
	)); ?>

	<div class="form-group col-md-1 col-sm-1 col-xs-12">
		<?php echo $form->labelEx($model, 'id', array(
			// 'class' => 'col-md-10 col-sm-10 col-xs-10',
		)); ?>
		<div class="">
			<?php echo $form->textField($model, 'id', array(
				'class' => 'form-control',
			)); ?>
			<?php echo $form->error($model, 'id'); ?>
		</div>
	</div>
	<div class="form-group col-md-2 col-sm-2 col-xs-12">
		<?php echo $form->labelEx($model, 'search_start_date', array(
			// 'class' => 'col-md-12 col-sm-12 col-xs-12',
		)); ?>
		<div class="">
			<div class="input-prepend input-group">
				<span class="add-on input-group-addon">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
				</span>
				<?php echo $form->textField($model, 'search_start_date', array(
					'class' => 'form-control datepicker',
					'size' => 25,
					'maxlength' => 50,
					'autocomplete' => 'off'
				)); ?>
			</div>
			<?php echo $form->error($model, 'search_start_date'); ?>
		</div>
	</div>
	<div class="form-group col-md-2 col-sm-2 col-xs-12">
		<?php echo $form->labelEx($model, 'search_end_date', array(
			// 'class' => 'col-md-12 col-sm-12 col-xs-12',
		)); ?>
		<div class="">
			<div class="input-prepend input-group">
				<span class="add-on input-group-addon">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
				</span>
				<?php echo $form->textField($model, 'search_end_date', array(
					'class' => 'form-control datepicker',
					'size' => 25,
					'maxlength' => 50,
					'autocomplete' => 'off'
				)); ?>
			</div>
			<?php echo $form->error($model, 'search_end_date'); ?>
		</div>
	</div>
	<div class="form-group col-md-2 col-sm-2 col-xs-12">
		<?php echo $form->labelEx($model, 'search_loan_date', array(
			// 'class' => 'col-md-10 col-sm-10 col-xs-10',
		)); ?>
		<div class="">
			<?php echo $form->textField($model, 'search_loan_date', array(
				'class' => 'form-control',
			)); ?>
			<?php echo $form->error($model, 'search_loan_date'); ?>
		</div>
	</div>
	<div class="form-group col-md-2 col-sm-2 col-xs-12">
		<?php echo $form->labelEx($model, 'search_status', array(
			// 'class' => 'col-md-10 col-sm-10 col-xs-10',
		)); ?>
		<div class="">
			<?php echo $form->textField($model, 'search_status', array(
				'class' => 'form-control',
			)); ?>
			<?php echo $form->error($model, 'search_status'); ?>
		</div>
	</div>

	<div class="form-group col-md-2 col-sm-2 col-xs-12" style="padding-top: 25px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<?php echo CHtml::submitButton('Tìm kiếm', ['class' => 'btn btn-success btn-sm']) ?>
		</div>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- search-form -->

<style>
	.search-form {
		padding: 10px 0 px;
		border-top: 1px solid #ddd;
	}
</style>