<?php
/* @var $this ATransactionCategoryController */
/* @var $model ATransactionCategory */

$this->breadcrumbs=array(
	'Atransaction Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ATransactionCategory', 'url'=>array('index')),
	array('label'=>'Create ATransactionCategory', 'url'=>array('create')),
	array('label'=>'Update ATransactionCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ATransactionCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ATransactionCategory', 'url'=>array('admin')),
);
?>

<h1>View ATransactionCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'in_out',
		'code',
		'sort_index',
		'status',
	),
)); ?>
