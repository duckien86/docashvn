<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */

$this->breadcrumbs = array(
	'Hợp đồng vay họ' => array('admin'),
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
<!-- top summary -->
<div id="top_summary">
	<?php $this->renderPartial('_top_summary', ['model' => $model, 'shop_id' => $shop_id]); ?>
</div>
<!-- /top summary -->

<!-- Search -->
<!-- <div class="x_panel"> -->
<!-- </div> -->
<!-- /Search -->

<!-- table -->
<div class="row">
	<h4><span class="glyphicon glyphicon-calendar"></span> Hợp đồng vay họ</h4>
	<?php $this->renderPartial('_search', ['model' => $model]);
	?>
	<?php
	$modalCreateNewID = 'modal-create-new';
	$modalUpdateID = 'modal-update-contract';
	$modalInstallmentPayment = 'modal-installment-payment';

	echo CHtml::button('Tạo mới', ['data-toggle' => 'modal', 'data-target' => "#$modalCreateNewID", 'class' => 'btn btn-primary btn-sm',]);
	// modal form tạo mới hợp đồng
	$this->renderPartial('_create_new_modal', ['model' => new AInstallment('createNew'), 'modalID' => $modalCreateNewID, 'shop_id' => $shop_id]);
	// modal form cập nhật hợp đồng
	$this->renderPartial('_update_contract_modal', ['model' => $model, 'modalID' => $modalUpdateID, 'shop_id' => $shop_id]);
	// modal form thanh toán tiền 
	$this->renderPartial('_payment_modal', ['modalID' => $modalInstallmentPayment, 'shop_id' => $shop_id]);
	// $this->renderPartial('_payment_modal', ['model' => $model, 'modalID' => $modalInstallmentPayment, 'shop_id' => $shop_id]);

	// bảng danh sách
	$this->widget('booster.widgets.TbGridView', array(
		'id' => 'ainstallment-grid',
		'dataProvider' => $model->search(),
		'template' => '{items}{pager}', // Disable the summary row
		// 'filter' => $model,
		'itemsCssClass' => 'table table-bordered table-striped table-hover jambo_table responsive-utilities',
		'htmlOptions' => array(
			'style' => 'font-size:12px',
		),

		'columns' => array(
			array(
				'header' => 'Mã',
				'type' => 'raw',
				'value' => function ($data) {
					return 'BH-' . $data->id;
				},
				'htmlOptions' => array(
					'style' => 'width:80px;word-break: break-word;vertical-align:middle;',
				),
			),
			array(
				'header' => 'Tên khách',
				'type' => 'raw',
				'value' => function ($data) {
					return CHtml::link("<b>{$data->customer_name}</b>", '', ['onclick' => "renderUpdateForm({$data->id})"]);
				},
				'htmlOptions' => array(
					'style' => 'width:130px;word-break: break-word;vertical-align:middle;',
				),
			),
			array(
				'header' => 'Tiền đưa khách',
				'type' => 'raw',
				'value' => function ($data) {
					return Utils::numberFormat($data->receive_money);
				},
				'htmlOptions' => array(
					'style' => 'width:130px;word-break: break-word;vertical-align:middle;',
				),
			),
			array(
				'header' => 'Tỉ lệ',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->calInterestRate();
				},
				'htmlOptions' => array(
					'style' => 'width:80px;word-break: break-word;vertical-align:middle;',
				),
			),
			array(
				'header' => 'Thời gian',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->calStartDate(true, 'Y-m-d', 'd/m') . ' -> '
						. $data->calEndDate(true, 'Y-m-d', 'd/m') . "<br> ({$data->loan_date} ngày)";
				},
				'htmlOptions' => array(
					'style' => 'width:120px;word-break: break-word;vertical-align:middle;',
				),
			),
			array(
				'header' => 'Tiền đã đóng',
				'type' => 'raw',
				'value' => function ($data) {
					$data->calculateAll();
					return $data->calPaidAmount() . "<br> ({$data->paidPeriods} kỳ)";
				},
				'htmlOptions' => array(
					'style' => 'width:110px;word-break: break-word;vertical-align:middle;',
				),
			),
			array(
				'header' => 'Nợ cũ',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->calOverBalance() < 0 ? $data->calOverBalance() : '';
				},
				'htmlOptions' => array(
					'style' => 'width:100px;word-break: break-word;vertical-align:middle;',
				),
			),
			array(
				'header' => 'Tiền 1 ngày',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->calAmountPerDay();
				},
				'htmlOptions' => array(
					'style' => 'width:100px;word-break: break-word;vertical-align:middle;',
				),
			),
			array(
				'header' => 'Còn thiếu',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->calRemainMoney() . "<br> ({$data->remainPeriods} kỳ)";
				},
				'htmlOptions' => array(
					'style' => 'width:100px;word-break: break-word;vertical-align:middle;',
				),
			),

			array(
				'header' => 'Tình trạng',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->calStatus();
				},
				'htmlOptions' => array(
					'style' => 'width:90px;word-break: break-word;vertical-align:middle;',
				),
			),

			array(
				'header' => 'Ngày đóng tiền',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->calNextPaidDate();
				},
				'htmlOptions' => array(
					'style' => 'width:120px;word-break: break-word;text-align:center;vertical-align:middle;',
				),
			),

			array(
				'header' => 'Thao tác',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->generateColumnButton();
				},
				'htmlOptions' => array('style' => 'width:90px;word-break: break-word;vertical-align:middle;'),
			),

		),
	));

	?>
</div>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl ?>/js/form-function.js"></script>
<!-- PNotify  -->
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl ?>/js/notify/pnotify.core.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl ?>/js/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl ?>/js/notify/pnotify.nonblock.js"></script>

<script>
	// load lại bảng dữ liệu khi có sự kiện đóng mở form
	$('body').on('hidden.bs.modal', '.modal', function() {
		// load phần summary
		renderTopSummary('#top_summary');
		// load lại bảng 
		$('#ainstallment-grid').yiiGridView('update', {
			data: $(this).serialize()
		});
	});

	// render top summary
	function renderTopSummary(contentId) {
		// Submit the form via Ajax
		$.ajax({
			url: '<?= $this->createUrl('aInstallment/renderTopSummary') ?>',
			type: 'POST',
			data: {
				'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken ?>'
			},
			dataType: 'json',
			success: function(response) { // Handle the successful response
				if (response.content != '')
					$(contentId).html(response.content);
			},
			error: function(xhr) { // Handle the error
			}
		});
	}
</script>