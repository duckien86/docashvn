<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */
/* @var $form CActiveForm */
?>


<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'id' => 'ainstallment-form',
	'enableAjaxValidation' => true,
	'htmlOptions' => ['class' => 'form-horizontal form-label-left'],
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
	<?php echo $form->labelEx($model, 'shop_id', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'shop_id', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'shop_id'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'create_by', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'create_by', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'create_by'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'customer_name', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'customer_name', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'customer_name'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'phone_number', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'phone_number', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'phone_number'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'address', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'address', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'address'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'personal_id', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'personal_id', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'personal_id'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'total_money', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'total_money', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'total_money'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'receive_money', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'receive_money', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'receive_money'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'loan_date', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'loan_date', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'loan_date'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'frequency', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'frequency', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'frequency'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'is_before', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'is_before', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'is_before'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'start_date', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="input-prepend input-group">
			<span class="add-on input-group-addon">
				<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
			</span>
			<?php echo $form->textField($model, 'start_date', array(
				'class' => 'form-control',
				'size' => 25,
				'maxlength' => 50,
				'autocomplete' => 'off'
			)); ?>
		</div>

		<?php
		// echo $form->textField($model, 'start_date', array(
		// 	'class' => 'form-control col-md-7 col-xs-12',
		// )); 
		?>
	</div>
	<?php echo $form->error($model, 'start_date'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'create_date', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'create_date', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'create_date'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'note', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'note', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'note'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'manage_by', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'manage_by', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'manage_by'); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'status', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model, 'status', array(
			'class' => 'form-control col-md-7 col-xs-12',
		)); ?>
	</div>
	<?php echo $form->error($model, 'status'); ?>
</div>

<div class="form-group buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Lưu lại', ['class' => 'btn btn-primary']); ?>
</div>

<?php $this->endWidget(); ?>

<script>
	$('#AInstallment_start_date').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		//            timePicker: true,
		timePickerIncrement: 5,
		format: 'DD/MM/YYYY',
		buttonClasses: ['btn btn-default'],
		applyClass: 'btn-small btn-primary',
		cancelClass: 'btn-small',
		locale: {
			applyLabel: 'Áp dụng',
			cancelLabel: 'Đóng',
			daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
			monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
			firstDay: 1
		}
	}, function() {});
</script>