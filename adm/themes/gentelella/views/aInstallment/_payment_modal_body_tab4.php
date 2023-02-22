<!-- Lịch đóng tiền -->
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: unset;">
	<!-- <table class="table table-striped responsive-utilities jambo_table bulk_action"> -->
	<table class="table table-striped responsive-utilities jambo_table">
		<thead>
			<tr class="headings">
				<th class="column-title">STT </th>
				<th class="column-title">Ngày GD </th>
				<th class="column-title">Người TH </th>
				<th class="column-title">Số tiền </th>
				<th class="column-title">Nội dung </th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 0;
			foreach ($items as $item) {
			?>
				<tr class="even pointer">
					<td class=" "><?= ++$i ?></td>
					<td class=" "><?= $item->calCreateDate(); ?></td>
					<td class=" "><?= $item->createByUserName; ?></td>
					<td class=" "><?= $item->calAmount(); ?></td>
					<td class=" "><?= $item->note; ?></td>
				</tr>
			<?php } ?>
		</tbody>

	</table>
</div>

<script>
	function doPayment(installment_id, item_id) {

		var current_modal_id = '#<?= $modalID ?>';
		const current_modal = $(current_modal_id);

		$.ajax({
			url: '<?= $this->createUrl('aInstallment/doPayment') ?>',
			type: 'POST',
			data: {
				installment_id: installment_id,
				item_id: item_id,
				'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken ?>'
			},
			dataType: 'json',
			success: function(response) {

				if (response.ok == true) { // Có dữ liệu
					initPaymentForm(installment_id);
					new PNotify({
						title: 'Thao tác thành công!',
						// text: 'Khách hàng +' + data.customer_name,
						type: 'info'
					});
				} else {
					new PNotify({
						title: 'Thao tác thất bại!',
						// text: 'Khách hàng +' + data.customer_name,
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