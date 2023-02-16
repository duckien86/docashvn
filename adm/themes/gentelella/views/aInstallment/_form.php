<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'id' => 'ainstallment-form',
	'action' => $this->createUrl('aInstallment/create'),
	'enableAjaxValidation' => false,
	'htmlOptions' => ['class' => 'form-horizontal form-label-left'],
)); ?>

<?php //echo $form->errorSummary($model);
?>
<div id="error_summary">
	<!-- Hiển thị lỗi tổng hợp ở đây -->
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'customer_name', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'customer_name', array(
			'class' => 'form-control col-md-4 col-sm-4 col-xs-12',
		)); ?>
		<?php echo $form->error($model, 'customer_name'); ?>
	</div>
	<?php echo $form->labelEx($model, 'id', array(
		'class' => 'control-label col-md-2 col-sm-2 col-xs-12',
	)); ?>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<?php echo $form->textField($model, 'id', array(
			'class' => 'form-control',
		)); ?>
		<?php echo $form->error($model, 'id'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'personal_id', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'personal_id', array(
			'class' => 'form-control',
		)); ?>
		<?php echo $form->error($model, 'personal_id'); ?>
	</div>
	<?php echo $form->labelEx($model, 'phone_number', array(
		'class' => 'control-label col-md-2 col-sm-2 col-xs-12',
	)); ?>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<?php echo $form->textField($model, 'phone_number', array(
			'class' => 'form-control',
		)); ?>
		<?php echo $form->error($model, 'phone_number'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'address', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<?php echo $form->textArea($model, 'address', array(
			'class' => 'form-control',
			'style' => 'height:auto',
		)); ?>
		<?php echo $form->error($model, 'address'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'total_money', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'total_money', array(
			'class' => 'form-control',
			'onchange' => "formatNumberModalInput('#$modalID','#AInstallment_total_money')",
		)); ?>
		<?php echo $form->error($model, 'total_money'); ?>
	</div>
	<div class="col-md-5">(Chú ý: Bát họ nghĩa là tổng tiền khách phải đóng)</div>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'receive_money', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'receive_money', array(
			'class' => 'form-control',
			'onchange' => "formatNumberModalInput('#$modalID','#AInstallment_receive_money')",
		)); ?>
		<?php echo $form->error($model, 'receive_money'); ?>
	</div>
	<div class="col-md-5">(Tổng tiền khách nhận được)</div>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'loan_date', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'loan_date', array(
			'class' => 'form-control',
		)); ?>
		<?php echo $form->error($model, 'loan_date'); ?>
	</div>
	<div class="col-md-5">Ngày => ( 0 / 1 ngày )</div>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'frequency', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->textField($model, 'frequency', array(
			'class' => 'form-control',
		)); ?>
		<?php echo $form->error($model, 'frequency'); ?>
	</div>
	<div class="col-md-5">(VD : 3 ngày đóng 1 lần thì điền số 3 )</div>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'start_date', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
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
	<?php echo $form->labelEx($model, 'is_before', array(
		'class' => 'control-label col-md-2 col-sm-2 col-xs-12',
	)); ?>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<?php echo $form->checkbox($model, 'is_before', array(
			'class' => 'icheckbox_flat-green checked',
		)); ?>
	</div>
</div>
<div class="form-group">
	<?php echo $form->labelEx($model, 'note', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<?php echo $form->textArea($model, 'note', array(
			'class' => 'form-control',
			'style' => 'height:auto',
		)); ?>
		<?php echo $form->error($model, 'note'); ?>
	</div>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'manage_by', array(
		'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
	)); ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php echo $form->dropDownList($model, 'manage_by', AUsers::list2Arr(), array(
			'class' => 'form-control',
		)); ?>
		<?php echo $form->error($model, 'manage_by'); ?>
	</div>
	<div class="col-md-5">(Người đi thu tiền họ cho HĐ)</div>
</div>

<div class="form-groupbuttons pull-right">
	<?php echo CHtml::button('Lưu lại', ['class' => 'btn btn-primary', 'onclick' => "submitForm('#ainstallment-form')"]); ?>
	<?php echo CHtml::button('Thoát', ['id' => 'btn-close-modal', 'class' => 'btn btn-danger', 'data-dismiss' => "modal"]); ?>
</div>
<div class="clearfix"></div>
<div class="form-group">
	*Chú ý : Khách hàng phải đảm bảo lãi suất và chi phí khi cho vay (gọi chung là "chi phí vay") tuân thủ quy định pháp luật tại từng thời điểm.
</div>
<?php $this->endWidget(); ?>

<script>
	$(document).ready(function() {
		$('.datepicker').daterangepicker({
			singleDatePicker: true, // Nếu sử dụng from - to date thì set: false
			showDropdowns: true,
			// timePicker: true,
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

	});
</script>