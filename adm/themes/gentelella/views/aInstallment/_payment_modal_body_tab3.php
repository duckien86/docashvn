<!-- Đóng hợp đồng có tiền khác -->
<?php
if ($installment->overBalance > 0) {
	$remainMoney =  $installment->remainMoney + $installment->overBalance;
	$oldDebt =   $installment->overBalance;
} else {
	$remainMoney =  $installment->remainMoney;
	$oldDebt =  0;
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 text-center">
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12 text-left bold">Khách hàng nợ lãi phí</div>
		<div class="col-md-12 col-sm-12 col-xs-12 add-debit">
			<div class="col-md-6 text-left">
				Số tiền nợ lần này
			</div>
			<?= CHtml::textField('add_debit_1_amount', 0, [
				'id' => 'add-debit-1-amount',
				'class' => 'col-md-6 text-left',
				'onkeyup' => "formatNumberModalInput('#$modalID','#add-debit-1-amount'); "
			]) ?>
			<div class="col-md-12 text-right">
				<?= CHtml::button('Ghi nợ', ['class' => 'btn btn-primary', 'onclick' => "addDebit({$installment->id},1)"]) ?>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12 ">
		<div class="col-md-12 col-sm-12 col-xs-12 text-left bold">Khách hàng trả nợ</div>
		<div class="col-md-12 col-sm-12 col-xs-12 add-debit">
			<div class="col-md-6 text-left">
				Số tiền trả nợ
			</div>
			<?= CHtml::textField('add_debit_2_amount', 0, [
				'id' => 'add-debit-2-amount',
				'class' => 'col-md-6 text-left',
				'onkeyup' => "formatNumberModalInput('#$modalID','#add-debit-2-amount'); "
			]) ?>
			<div class="col-md-12 text-right">
				<?= CHtml::button('Thanh toán', ['class' => 'btn btn-primary ', 'onclick' => "addDebit({$installment->id},2)"]) ?>
			</div>
		</div>
	</div>
</div>

<style>
	.add-debit {
		padding: 15px 20px 5px 12px;
		border: 1px solid #ddd;
		background: #ecdfdf47;
	}

	.add-debit div {
		margin: 5px 0px;
	}
</style>


<script>
	function calTotalPaid(modal_id) {
		const modal = $(modal_id);
		let remain_money = parseInt(modal.find('#remain-money').val().replace(/\./g, ''));
		let extra_money = parseInt(modal.find('#extra-money').val().replace(/\./g, ''));
		let old_debt = parseInt(modal.find('#old-debt').val().replace(/\./g, ''));
		let total_paid = formatCurrency((remain_money - old_debt) + extra_money)
		modal.find('#total-paid').val(total_paid);
	}

	/** 
	 * Đóng hợp đồng
	 * @param: is_extra_money - phân biệt đóng hợp đồng theo dạng nào
	 */
	function addDebit(installment_id, type = 0) {

		var current_modal_id = '#<?= $modalID ?>';
		var extra_money = 0;
		const current_modal = $(current_modal_id);

		if (is_extra_money == true) {
			extra_money = current_modal.find('#extra-money').val().replace(/\./g, '');
		}
		$.ajax({
			url: '<?= $this->createUrl('aInstallment/doCloseContract') ?>',
			type: 'POST',
			data: {
				installment_id: installment_id,
				extra_money: extra_money,
				'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken ?>'
			},
			dataType: 'json',
			success: function(response) {

				if (response.ok == true) { // Có dữ liệu
					initPaymentForm(installment_id);
					new PNotify({
						title: 'Đóng hợp đồng thành công! ',
						// text: 'text in body',
						type: 'info'
					});
				} else {
					new PNotify({
						title: 'Đóng hợp đồng thất bại!',
						// text: 'text in body',
						type: 'error'
					});
				}
				// Handle the successful response
			},
			error: function(xhr) {
				// // Handle the error
				// $('form *').prop('disabled', false);
			}
		});
	}
</script>