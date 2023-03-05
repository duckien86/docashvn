<!-- Lịch đóng tiền -->
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: unset;">
	<!-- <table class="table table-striped responsive-utilities jambo_table bulk_action"> -->
	<table class="table table-striped responsive-utilities jambo_table">
		<thead>
			<tr class="headings">
				<th class="column-title">In </th>
				<th class="column-title">STT </th>
				<th class="column-title">Ngày họ </th>
				<th class="column-title">Tiền họ </th>
				<th class="column-title">Ngày giao dịch </th>
				<th class="column-title">Tiền khách trả </th>
				<th class="column-title no-link last"><span class="nobr"></span>
					<!-- </th> -->
					<!-- <th class="bulk-actions" colspan="7">
					<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
				</th> -->
					<!-- <th> -->
					<!-- <input type="checkbox" id="check-all" class="flat"> -->
				</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$i = 0;
			foreach ($items as $item) {
			?>
				<tr class="even pointer">
					<td class=" "></td>
					<td class=" "><?= ++$i ?></td>
					<td class=" "><?= $item->calPaymentDate(); ?></td>
					<td class=" "><?= $item->calAmount(); ?></td>
					<td class=" "><?= $item->calTransDate(); ?></td>
					<td class=" "><?= $item->calTransAmount(); ?></td>
					<td class="a-center "><input type="checkbox" <?php if (!empty($item->transaction_id)) echo 'checked'; ?> class="flat" onclick="doPayment(<?= $item->installment_id ?>,<?= $item->id ?>)"></td>
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
						title: 'Nộp tiền thành công! ' + response.rowAffected,
						// text: 'text in body',
						type: 'info'
					});
				} else {
					new PNotify({
						title: 'Nộp tiền thất bại!',
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