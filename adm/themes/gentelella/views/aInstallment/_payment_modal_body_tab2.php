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
<div><?= CHtml::link('>>>> Đóng hợp đồng có tiền khác', 'javascript:void(0);', [
			'onclick' => "$('#close-contract-extra').toggle();",
			'class' => "blue"
		]) ?></div>
<div class="col-md-12 col-sm-12 col-xs-12 well" id='close-contract-extra' style="display:none">
	<div class="col-md-6 title-left">
		Số tiền còn phải đóng :
	</div>
	<div class="col-md-6 title-right">
		<?= CHtml::textField('remain_money', Utils::numberFormat($remainMoney), ['id' => 'remain-money', 'disabled' => true]) ?>
	</div>
	<div class="col-md-6 title-left">
		Nợ cũ :
	</div>
	<div class="col-md-6 title-right">
		-<?= CHtml::textField('old_debt', Utils::numberFormat($oldDebt), ['id' => 'old-debt', 'disabled' => true]) ?>
	</div>
	<div class="col-md-6 title-left">
		Tiền khác :
	</div>
	<div class="col-md-6 title-right">
		<?= CHtml::textField('extra_money', 0, [
			'id' => 'extra-money',
			'onkeyup' => "formatNumberModalInput('#$modalID','#extra-money');calTotalPaid('#$modalID'); "
		]) ?>
	</div>
	<div class="col-md-6 title-left bold red">
		Tổng tiền phải đóng :
	</div>
	<div class="col-md-6 title-right bold red">
		<?= CHtml::textField('total_paid', Utils::numberFormat($remainMoney - $oldDebt), [
			'id' => 'total-paid',
			'disabled' => true,
			'onchange' => "formatNumberModalInput('#$modalID','#total-paid');"
		]) ?>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		<div class="col-md-6 title-left"></div>
		<div class="col-md-6 title-right">
			<?= CHtml::button('Đóng HĐ (tiền khác)', ['class' => 'btn btn-primary', 'onclick' => "closeContract({$installment->id},true)"]) ?>
		</div>
	</div>
</div>
<!-- Ghi chú đóng hợp đồng -->
<hr>
<div class="col-md-12 col-sm-12 col-xs-12 well">
	<div class="col-md-6 title-right">
		<p>Số kỳ còn phải đóng :<span class="bold red"><?= $installment->remainPeriods ?> kỳ (=<?= Utils::numberFormat($remainMoney); ?>)</span> </p>
		<p>Tiền thừa : <span class="bold red"><?= Utils::numberFormat($oldDebt); ?></span></p>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12 title-right">
		<?= CHtml::button('Đóng hợp đồng', ['class' => 'btn btn-primary', 'onclick' => "closeContract({$installment->id})"]) ?>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12 title-right">
		&nbsp; </div>
</div>

<style>
	.title-left {
		font-weight: bold;
		text-align: right;
		/* border-top: 1px solid #ddd; */
		padding: 10px;
	}

	.title-right {
		text-align: left;
		/* border-top: 1px solid #ddd;
		border-left: 1px solid #ddd; */
		padding: 10px;
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
	function closeContract(installment_id, is_extra_money = false) {

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
						title: 'Thông báo',
						text: 'Đóng hợp đồng thành công! ',
						type: 'info'
					});
				} else {
					new PNotify({
						title: 'Thông báo',
						text: 'Đóng hợp đồng thất bại!',
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