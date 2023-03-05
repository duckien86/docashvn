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
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: unset;">
	<div class="col-md-6 title-left">
		Số tiền còn phải đóng :
	</div>
	<div class="col-md-6 title-right">
		<?= Utils::numberFormat($remainMoney);  ?>
	</div>
	<div class="col-md-6 title-left">
		Nợ cũ :
	</div>
	<div class="col-md-6 title-right">
		<?= Utils::numberFormat($oldDebt);  ?>
	</div>
	<div class="col-md-6 title-left">
		Tiền khác :
	</div>
	<div class="col-md-6 title-right">
		<?= CHtml::textField('extra_money', 0, ['id' => 'extra-money-field', 'onkeyup' => '']) ?>
	</div>
	<div class="col-md-6 title-left">
		Tổng tiền phải đóng :
	</div>
	<div class="col-md-6 title-right" id="total_id">
		0
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 text-center" id="total_id">
		<?= CHtml::button('Đóng HĐ (tiền khác)', ['class' => 'btn btn-primary', 'onclick' => 'closeContract()']) ?>
	</div>
</div>
<!-- Ghi chú đóng hợp đồng -->
<div class='space_20'></div>
<hr>
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: unset;">
	<div class="col-md-6 title-right">
		<p><b>Số kỳ còn phải đóng :</b> <?= $installment->remainPeriods ?> kỳ (=<?= Utils::numberFormat($remainMoney);  ?>)</p>
		<p><b>Tiền thừa :</b> <?= Utils::numberFormat($oldDebt); ?></p>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12 title-right">
		<?= CHtml::button('Đóng hợp đồng', ['class' => 'btn btn-primary', 'onclick' => 'closeContract()']) ?>
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
	// function doPayment(installment_id, item_id) {

	// 	var current_modal_id = '#<?= $modalID ?>';
	// 	const current_modal = $(current_modal_id);

	// 	$.ajax({
	// 		url: '<?= $this->createUrl('aInstallment/doPayment') ?>',
	// 		type: 'POST',
	// 		data: {
	// 			installment_id: installment_id,
	// 			item_id: item_id,
	// 			'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken ?>'
	// 		},
	// 		dataType: 'json',
	// 		success: function(response) {

	// 			if (response.ok == true) { // Có dữ liệu
	// 				initPaymentForm(installment_id);
	// 				new PNotify({
	// 					title: 'Nộp tiền thành công! ' + response.rowAffected,
	// 					// text: 'text in body',
	// 					type: 'info'
	// 				});
	// 			} else {
	// 				new PNotify({
	// 					title: 'Nộp tiền thất bại!',
	// 					// text: 'text in body',
	// 					type: 'error'
	// 				});
	// 			}
	// 			// Handle the successful response
	// 		},
	// 		error: function(xhr) {
	// 			// // Handle the error
	// 			// $('form *').prop('disabled', false);
	// 		}
	// 	});

	// }
</script>