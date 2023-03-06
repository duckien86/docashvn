<!-- Quản lý thông tin và các nghiệp vụ Vay Họ -->
<!-- // begin modal  -->
<?php
$this->beginWidget(
	'booster.widgets.TbModal',
	array(
		'id' => $modalID,
		'fade' => true,
		'options' => ['backdrop' => 'static', 'keyboard' => false],
		'htmlOptions' => [
			// 'class' => 'modal-dialog modal-dialog-centered'
		]
	)
); ?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h3 class="text-center">Hợp đồng vay họ</h3>
</div>
<div class="modal-body">
	<div id="body-content">
		<div class="row" id="_payment_modal_top_area">
			<?php
			// echo $this->renderPartial('_payment_modal_top', array(
			// 	'model' => $model,
			// 	'modalID' => $modalID,
			// ));
			?>
		</div>
		<div class="clearfix"></div>
		<div class="row" id="_payment_modal_body_area">
			<?php
			//  echo $this->renderPartial('_payment_modal_body', array(
			// 	'model' => $model,
			// 	'modalID' => $modalID,
			// ));
			?>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>

<!-- // end modal -->

<script>
	// Khởi tạo form thanh toán
	function initPaymentForm(id) {

		const current_modal = $('#<?= $modalID ?>');
		$.ajax({
			url: '<?= $this->createUrl('aInstallment/initPaymentForm') ?>',
			type: 'POST',
			data: {
				id: id,
				'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken ?>'
			},
			dataType: 'json',
			success: function(response) {

				if (response.payment_modal_top != null) { // Có dữ liệu
					current_modal.find('#_payment_modal_top_area').html(response.payment_modal_top);
				} else {
					current_modal.find('#_payment_modal_top_area').html('Không có dữ liệu');
				}
				if (response.payment_modal_body != null) { // Có dữ liệu
					current_modal.find('#_payment_modal_body_area').html(response.payment_modal_body);
				} else {
					current_modal.find('#_payment_modal_body_area').html('Không có dữ liệu');
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

<style>
	.modal-dialog {
		width: 700px;
	}
</style>