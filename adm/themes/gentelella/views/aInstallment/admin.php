<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */

$this->breadcrumbs = array(
	'Ainstallments' => array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#ainstallment-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<h4>Hợp đồng vay họ</h4>


<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); 
?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div><!-- search-form -->

<?php
echo CHtml::button('Tạo mới', array(
	'data-toggle' => 'modal',
	'data-target' => '#modal-id',
	'class' => 'btn btn-primary btn-sm',
));

$this->widget('booster.widgets.TbGridView', array(
	'id' => 'ainstallment-grid',
	'dataProvider' => $model->search(),
	// 'filter' => $model,
	'itemsCssClass' => 'table table-bordered table-striped table-hover jambo_table responsive-utilities',
	'columns' => array(
		array(
			'name' => 'id',
			'type' => 'raw',
			'value' => function ($data) {
				return 'BH-' . $data->id;
			},
			'htmlOptions' =>
			array(
				'style' => 'width:100px;word-break: break-word;vertical-align:middle;',
			),
		),
		array(
			'name' => 'customer_name',
			'type' => 'raw',
			'htmlOptions' =>
			array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),
		array(
			'name' => 'receive_money',
			'type' => 'raw',
			'value' => function ($data) {
				return Utils::numberFormat($data->receive_money);
			},
			'htmlOptions' =>
			array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),

		array(
			'name' => 'start_date',
			'type' => 'raw',
			'htmlOptions' =>
			array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),
		array(
			'name' => 'create_date',
			'type' => 'raw',
			'htmlOptions' =>
			array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),
		array(
			'name' => 'status',
			'type' => 'raw',
			'htmlOptions' =>
			array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),
		array(
			'class' => 'booster.widgets.TbButtonColumn',
			'template' => '{payment}',
			'buttons'      => array(
				'payment'  => array(
					'icon' => 'glyphicon glyphicon-usd',
					'label' => 'Trả tiền',
					'options' => array(
						'onclick' => 'alert();',
					),
					// 'url' => function ($data) {
					// 	return Yii::app()->createUrl('aCardStoreBusiness/viewExport', array('id' => $data->id));
					// }
				),
			),

			'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
		),
	),
));
?>
<!-- modal create new -->
<?php
$this->beginWidget(
	'booster.widgets.TbModal',
	array(
		'id' => 'modal-id',
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
		<?php echo $this->renderPartial('_form', array(
			'model' => $model,
		));
		?>
	</div>
	<div class="space_30"></div>
</div>
<?php $this->endWidget(); ?>

<!-- // end modal create new -->
<script type="text/javascript" src="/docashvn/adm/themes/gentelella/js/form-function.js"></script>
<!-- PNotify -->
<script type="text/javascript" src="/docashvn/adm/themes/gentelella/js/notify/pnotify.core.js"></script>
<script type="text/javascript" src="/docashvn/adm/themes/gentelella/js/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="/docashvn/adm/themes/gentelella/js/notify/pnotify.nonblock.js"></script>

<script>
	$(document).ready(function() {
		$("#modal-id").on('shown.bs.modal', function() { // Xử lý dựa theo sự kiện khởi tạo form

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
</style>

<style>
	.modal-dialog {
		width: 800px;
	}
</style>