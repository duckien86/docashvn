<?php
/* @var $this ACuaHangController */
/* @var $model ACuaHang */

$this->breadcrumbs=array(
	'Acua Hangs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ACuaHang', 'url'=>array('index')),
	array('label'=>'Create ACuaHang', 'url'=>array('create')),
	array('label'=>'Update ACuaHang', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ACuaHang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ACuaHang', 'url'=>array('admin')),
);
?>

<h1>View ACuaHang #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ten',
		'ghi_chu',
		'ngay_tao',
		'trang_thai',
	),
)); ?>
