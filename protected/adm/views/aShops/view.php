<?php
/* @var $this AShopsController */
/* @var $model AShops */

$this->breadcrumbs=array(
	'Ashops'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AShops', 'url'=>array('index')),
	array('label'=>'Create AShops', 'url'=>array('create')),
	array('label'=>'Update AShops', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AShops', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AShops', 'url'=>array('admin')),
);
?>

<h1>View AShops #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'note',
		'create_date',
		'create_by',
		'owner',
		'status',
	),
)); ?>
