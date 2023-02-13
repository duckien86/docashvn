<?php
/* @var $this AShopsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ashops',
);

$this->menu=array(
	array('label'=>'Create AShops', 'url'=>array('create')),
	array('label'=>'Manage AShops', 'url'=>array('admin')),
);
?>

<h1>Ashops</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
