<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */
/* @var $form CActiveForm */
?>
<div class="row row-top" style="margin-top: 2px;padding-bottom:0px">

	<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
		'htmlOptions' => ['class' => 'form-horizontal form-label'],
	)); ?>

	<div class="form-group col-md-2 col-sm-2 col-xs-12">
		<?php echo $form->labelEx($model, 'id', array(
			'class' => 'col-md-10 col-sm-10 col-xs-10',
		)); ?>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<?php echo $form->textField($model, 'id', array(
				'class' => 'form-control',
			)); ?>
			<?php echo $form->error($model, 'id'); ?>
		</div>
	</div>
	<div class="form-group col-md-2 col-sm-2 col-xs-12">
		<?php echo $form->labelEx($model, 'start_date', array(
			'class' => 'col-md-12 col-sm-12 col-xs-12',
		)); ?>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="input-prepend input-group">
				<span class="add-on input-group-addon">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
				</span>
				<?php echo $form->textField($model, 'start_date', array(
					'class' => 'form-control datepicker',
					'size' => 25,
					'maxlength' => 50,
					'autocomplete' => 'off'
				)); ?>
			</div>
			<?php echo $form->error($model, 'start_date'); ?>
		</div>
	</div>
	<div class="form-group col-md-2 col-sm-2 col-xs-12">
		<?php echo $form->labelEx($model, 'start_date', array(
			'class' => 'col-md-12 col-sm-12 col-xs-12',
		)); ?>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="input-prepend input-group">
				<span class="add-on input-group-addon">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
				</span>
				<?php echo $form->textField($model, 'start_date', array(
					'class' => 'form-control datepicker',
					'size' => 25,
					'maxlength' => 50,
					'autocomplete' => 'off'
				)); ?>
			</div>
			<?php echo $form->error($model, 'start_date'); ?>
		</div>
	</div>
	<div class="form-group col-md-2 col-sm-2 col-xs-12" style="padding-top: 25px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<?php echo CHtml::submitButton('Tìm kiếm', ['class' => 'btn btn-success btn-sm']) ?>
		</div>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- search-form -->