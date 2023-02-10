<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */

$this->breadcrumbs = array(
	'Ainstallments' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'Tạo mới AInstallment', 'url' => array('create')),
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

<h1>Hợp đồng vay họ</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'ainstallment-grid',
	'dataProvider' => $model->search(),
	// 'filter' => $model,
	'itemsCssClass' => 'table table-bordered table-striped table-hover jambo_table responsive-utilities',
	'columns' => array(
		// array(
		// 	'name' => 'id',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
		// array(
		// 	'name' => 'shop_id',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
		// array(
		// 	'name' => 'create_by',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
		array(
			'name' => 'customer_name',
			'type' => 'raw',
			'htmlOptions' => array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),
		// array(
		// 	'name' => 'phone_number',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
		// array(
		// 	'name' => 'address',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
		// array(
		// 	'name' => 'personal_id',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
		array(
			'name' => 'total_money',
			'type' => 'raw',
			'htmlOptions' =>
			array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),
		array(
			'name' => 'receive_money',
			'type' => 'raw',
			'htmlOptions' =>
			array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),
		array(
			'name' => 'loan_date',
			'type' => 'raw',
			'htmlOptions' =>
			array(
				'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
			),
		),
		// array(
		// 	'name' => 'frequency',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
		// array(
		// 	'name' => 'is_before',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
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
		// array(
		// 	'name' => 'note',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
		// array(
		// 	'name' => 'manage_by',
		// 	'type' => 'raw',
		// 	'htmlOptions' =>
		// 	array(
		// 		'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
		// 	),
		// ),
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
			'template' => '{update}{delete}',
			'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
		),
	),
)); ?>