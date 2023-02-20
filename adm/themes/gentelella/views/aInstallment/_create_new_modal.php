<!-- modal create new -->
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
		<?php
		echo $this->renderPartial('_form', array(
			'model' => $model,
			'modalID' => $modalID,
		));
		?>
	</div>
	<div class="space_30"></div>
</div>
<?php $this->endWidget(); ?>

<!-- // end modal create new -->

<script>
	$(document).ready(function() {
		$("#<?= $modalID ?>").on('shown.bs.modal', function() { // Xử lý dựa theo sự kiện khởi tạo form

			$('#ainstallment-form')[0].reset(); // reset lại giá trị trên form
			$('#error_summary').html(''); // xóa thông báo lỗi nếu có

			$('.datepicker').daterangepicker({ // nếu sử dụng qua modal cần phải gọi lại hàm này.để daterangepicker(0) được gọi lên 
				singleDatePicker: true, // Nếu sử dụng from - to date thì set: false
				showDropdowns: false,
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
	});
	// xử lý submit form
	function submitForm(formId) {

		// Get the form data
		var formData = $(formId).serialize();
		// disable form
		$('form *').prop('disabled', true);
		// Submit the form via Ajax
		$.ajax({
			url: '<?= $this->createUrl('aInstallment/create') ?>',
			type: 'POST',
			data: formData,
			dataType: 'json',
			success: function(response) {

				$('form *').prop('disabled', false); // Mở lại form cho phép chỉnh sửa

				if (response.ok == false && response.error != null) { // Không tạo đơn thành công
					$('#error_summary').html(response.error); // hiển thị lỗi
				} else {
					$('#ainstallment-form')[0].reset(); // reset lại giá trị trên form
					$('#error_summary').html(''); // xóa lỗi trước đó
					new PNotify({
						title: 'Tạo hợp đồng thành công!',
						// text: 'Khách hàng +' + data.customer_name,
						type: 'info'
					});

					$('#ainstallment-grid').yiiGridView('update', {
						data: $(this).serialize()
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
	// load lại bảng dữ liệu khi đóng form tạo mới
	$('#btn-close-modal').on('click', function() {
		$('#ainstallment-grid').yiiGridView('update', {
			data: $(this).serialize()
		});
	})
</script>

<style>
	.daterangepicker {
		/* set lại index để datepicker ko bị ẩn sau modal */
		z-index: 9999 !important;
	}

	.modal-dialog {
		width: 700px;
	}
</style>