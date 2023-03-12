	<?php
	/* @var $this AInstallmentController */
	/* @var $model AInstallment */
	/* @var $form CActiveForm */
	?>

	<!-- Form đảo họ -->
	<div class="col-md-12 col-sm-12 col-xs-12" style="padding: unset;">

		<?php
		// tính toán phần tiền khách nhận họ mới
		$receiveMoneyNew = $model->receive_money - $model->remainMoney + $model->overBalance;
		$strReceiveMoneyNew = "Tiền khách nhận về: {$model->calReceiveMoney()} - {$model->calRemainMoney()} {$model->calOverBalance()} = " . Utils::numberFormat($receiveMoneyNew);
		// convert data để hiện thị trên form 
		$model->prepareDisplayData();
		$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
			'id' => 'append-contract-form',
			'action' => $this->createUrl('aInstallment/appendContract'),
			'enableAjaxValidation' => false,
			'htmlOptions' => ['class' => 'form-horizontal form-label-left'],
		)); ?>

		<?php //echo $form->errorSummary($model);
		?>
		<div id="error-summary-append-contract">
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
					<?php echo $form->hiddenField($model, 'id', array()); ?>
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
					'onkeyup' => "formatNumberModalInput('#$modalID','#AInstallment_total_money');setPaidPerDay('#$modalID','#AInstallment_total_money','#AInstallment_loan_date','#paid-per-day');",
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
					'onkeyup' => "formatNumberModalInput('#$modalID','#AInstallment_receive_money'); cal_receive_money();",
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
		<div class="space_20"></div>
		<div class="form-group">
			<?php

			echo CHtml::label($strReceiveMoneyNew, '', array(
				'class' => 'col-md-12 col-sm-12 col-xs-12 red bold text-center',
				'style' => 'font-size:14px',
				'id' => 'receive-money-new',
			)); ?>
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
		/**
		 * calReceiveMoneyNew
		 * $model->receive_money - $model->remainMoney + $model->overBalance;
		 */
		function cal_receive_money() {
			const currentModal = $('#<?= $modalID ?>');

			let receive_money = parseInt(currentModal.find('#AInstallment_receive_money').val().replace(/\./g, ""));
			let remain_money = parseInt('<?= $model->remainMoney ?>'.replace(/\./g, ""));
			let over_balance = '<?= $model->overBalance ?>';

			over_balance = parseInt(over_balance.replace(/\./g, ""));

			let sign = '';
			if (over_balance > 0)
				sign = ' + ';
			else if (over_balance < 0)
				sign = ' - ';

			let i_receive_money_new = receive_money - remain_money;
			let str_receive_money_new = 'Tiền khách nhận về: ' + formatCurrency(receive_money) + ' - ' + formatCurrency(remain_money);
			if (over_balance != 0) {
				str_receive_money_new += sign + formatCurrency(Math.abs(over_balance));
				i_receive_money_new += over_balance;
			}
			str_receive_money_new += ' = ' + formatCurrency(i_receive_money_new);

			$('#receive-money-new').html(str_receive_money_new);
		}



		// xử lý submit form
		function append_contract(formId) {

			const currentModal = $('#<?= $modalID ?>');

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
						$('#error-summary-append-contract').html(response.error); // hiển thị lỗi
					} else {
						$(formId)[0].reset(); // reset lại giá trị trên form
						$('#error-summary-append-contract').html(''); // xóa lỗi trước đó
						new PNotify({
							title: 'Thông báo',
							text: 'Đảo họ thành công!',
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