<?php
/* @var $this ATransactionsController */
/* @var $model ATransactions */

$this->breadcrumbs=array(
	'Atransactions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ATransactions', 'url'=>array('index')),
	array('label'=>'Create ATransactions', 'url'=>array('create')),
	array('label'=>'Update ATransactions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ATransactions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ATransactions', 'url'=>array('admin')),
);
?>

<h1>View ATransactions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'customer',
		'amount',
		'note',
		'type',
		'group_id',
		'create_date',
		'ref_id',
		'status',
	),
)); ?>
