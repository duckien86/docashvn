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
<!-- top tiles -->
<?php $this->renderPartial('_top_summary', ['model' => $model, 'shop_id' => $shop_id]); ?>
<!-- /top tiles -->

<!-- table -->
<div class="row">

	<h4>Hợp đồng vay họ</h4>
	<?php
	$modalCreateNewID = 'modal-create-new';
	$modalInstallmentPayment = 'modal-installment-payment';

	echo CHtml::button('Tạo mới', ['data-toggle' => 'modal', 'data-target' => "#$modalCreateNewID", 'class' => 'btn btn-primary btn-sm',]);
	// modal form tạo mới hợp đồng
	$this->renderPartial('_create_new_modal', ['model' => $model, 'modalID' => $modalCreateNewID, 'shop_id' => $shop_id]);
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
				'header' => 'Thao tác',
				'type' => 'raw',
				'value' => function ($data) {
					return $data->generateColumnButton();
				},
				'htmlOptions' => array('style' => 'width:70px;word-break: break-word;vertical-align:middle;'),
			),

		),
	));

	?>
</div>
<script type="text/javascript" src="/docashvn/adm/themes/gentelella/js/form-function.js"></script>
<!-- PNotify  -->
<script type="text/javascript" src="/docashvn/adm/themes/gentelella/js/notify/pnotify.core.js"></script>
<script type="text/javascript" src="/docashvn/adm/themes/gentelella/js/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="/docashvn/adm/themes/gentelella/js/notify/pnotify.nonblock.js"></script>