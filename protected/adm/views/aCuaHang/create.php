<?php
/* @var $this ACuaHangController */
/* @var $model ACuaHang */

$this->breadcrumbs=array(
	'Acua Hangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ACuaHang', 'url'=>array('index')),
	array('label'=>'Manage ACuaHang', 'url'=>array('admin')),
);
?>

<h1>Create ACuaHang</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>