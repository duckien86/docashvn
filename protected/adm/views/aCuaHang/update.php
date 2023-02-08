<?php
/* @var $this ACuaHangController */
/* @var $model ACuaHang */

$this->breadcrumbs=array(
	'Acua Hangs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ACuaHang', 'url'=>array('index')),
	array('label'=>'Create ACuaHang', 'url'=>array('create')),
	array('label'=>'View ACuaHang', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ACuaHang', 'url'=>array('admin')),
);
?>

<h1>Update ACuaHang <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>