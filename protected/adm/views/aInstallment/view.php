<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */

$this->breadcrumbs=array(
	'Ainstallments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AInstallment', 'url'=>array('index')),
	array('label'=>'Create AInstallment', 'url'=>array('create')),
	array('label'=>'Update AInstallment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AInstallment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AInstallment', 'url'=>array('admin')),
);
?>

<h1>View AInstallment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'shop_id',
		'create_by',
		'customer_name',
		'phone_number',
		'address',
		'personal_id',
		'total_money',
		'receive_money',
		'loan_date',
		'frequency',
		'is_before',
		'start_date',
		'create_date',
		'note',
		'manage_by',
		'status',
	),
)); ?>
