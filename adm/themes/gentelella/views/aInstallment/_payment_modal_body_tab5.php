	<?php
	/* @var $this AInstallmentController */
	/* @var $model AInstallment */
	/* @var $form CActiveForm */
	?>

	<!-- Form đảo họ -->
	<div class="col-md-12 col-sm-12 col-xs-12" style="padding: unset;">

		<?php
		$model->prepareDisplayData(); // convert data to display on form
		$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
			'id' => 'append-contract-form',
			'action' => $this->createUrl('aInstallment/appendContract'),
			'enableAjaxValidation' => false,
			'htmlOptions' => ['class' => 'form-horizontal form-label-left'],
		)); ?>

		<?php //echo $form->errorSummary($model);
		?>
		<div id="error_summary">
			<!-- Hiển thị lỗi tổng hợp ở đây -->
		</div>
		<div class="form-group">
			<?php echo CHtml::label('Ngày đảo họ', 'start_date', array(
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
		</div>

		<div class="form-group">
			<?php echo CHtml::label('Bát họ mới', 'total_money', array(
				'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
			)); ?>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<?php echo $form->textField($model, 'total_money', array(
					'class' => 'form-control',
					'onload' => "formatNumberModalInput('#$modalID','#AInstallment_total_money')",
					'onkeyup' => "formatNumberModalInput('#$modalID','#AInstallment_total_money')",
				)); ?>
				<?php echo $form->error($model, 'total_money'); ?>
			</div>
			<div class="col-md-5 red">(@Chú ý: Họ nghĩa là tổng tiền Thành viên tham gia họ phải trả)</div>
		</div>
		<div class="form-group">
			<?php echo CHtml::label('Tiền đưa khách', 'receive_money', array(
				'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
			)); ?>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<?php echo $form->textField($model, 'receive_money', array(
					'class' => 'form-control',
					'onkeyup' => "formatNumberModalInput('#$modalID','#AInstallment_receive_money');",
					// 'onkeydown' => "setPaidPerDay('#$modalID','#AInstallment_total_money','#AInstallment_loan_date','#paid-per-day')",
				)); ?>
				<?php echo $form->error($model, 'receive_money'); ?>
			</div>
			<div class="col-md-5">(Đừng trừ tiền còn phải đóng của bát cũ vào đây. Hệ thống trừ sau)</div>
		</div>

		<div class="form-group">
			<?php echo CHtml::label('Kỳ lĩnh họ (Bốc trong vòng)', 'loan_date', array(
				'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
			)); ?>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<?php echo $form->numberField($model, 'loan_date', array(
					'class' => 'form-control',
					'onkeyup' => "setPaidPerDay('#$modalID','#AInstallment_total_money','#AInstallment_loan_date','#paid-per-day')",
				)); ?>
				<?php echo $form->error($model, 'loan_date'); ?>
			</div>
			<div class="col-md-5">Ngày => ( <span class="red" id="paid-per-day"></span> / 1 ngày )</div>
		</div>
		<div class="form-group">
			<?php echo CHtml::label('Số ngày lĩnh họ (Số ngày đóng tiền)', 'frequency', array(
				'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
			)); ?>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<?php echo $form->numberField($model, 'frequency', array(
					'class' => 'form-control',
				)); ?>
				<?php echo $form->error($model, 'frequency'); ?>
			</div>
			<div class="col-md-5">(VD : 3 ngày đóng 1 lần thì điền số 3 )</div>
		</div>
		<div class="form-group">
			<?php echo CHtml::label('Tiền khách nhận về: ', '', array(
				'class' => 'control-label col-md-3 col-sm-3 col-xs-12 red',
			)); ?>
			<div class="col-md-8 col-sm-4 col-xs-12 red" id="cal-receive-money">
				<!-- receive_money - remain_money + debt_amount -->
				<?php
				$receiveMoneyNew = Utils::str2Number($model->receive_money) - $model->remainMoney + $model->overBalance;
				echo "{$model->calReceiveMoney()} - {$model->calRemainMoney()} + {$model->calOverBalance()} = " . Utils::numberFormat($receiveMoneyNew);
				?>
			</div>
		</div>

		<div class="form-groupbuttons text-center">
			<?php echo CHtml::button('Đảo họ', ['class' => 'btn btn-primary', 'onclick' => "append_contract('#append-contract-form')"]); ?>
		</div>
		<div class="clearfix"></div>
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
	</div>

	<script>
		// xử lý submit form
		function append_contract(formId) {

			// Get the form data
			var formData = $(formId).serialize();
			// disable form
			$('form *').prop('disabled', true);
			// Submit the form via Ajax
			$.ajax({
				url: '<?= $this->createUrl('aInstallment/appendContract') ?>',
				type: 'POST',
				data: formData,
				dataType: 'json',
				success: function(response) {

					$('form *').prop('disabled', false); // Mở lại form cho phép chỉnh sửa

					if (response.ok == false && response.error != null) { // Không tạo đơn thành công
						$('#error_summary').html(response.error); // hiển thị lỗi
					} else {
						$(formId)[0].reset(); // reset lại giá trị trên form
						$('#error_summary').html(''); // xóa lỗi trước đó
						new PNotify({
							title: 'Thông báo',
							text: 'Tạo hợp đồng thành công!',
							type: 'info'
						});
					}
					// Handle the successful response
				},
				error: function(xhr) {
					// Handle the error
					$('form *').prop('disabled', false);
				}
			});
		}
	</script>