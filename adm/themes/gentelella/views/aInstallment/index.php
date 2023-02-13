<?php
/* @var $this AInstallmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ainstallments',
);

$this->menu=array(
	array('label'=>'Create AInstallment', 'url'=>array('create')),
	array('label'=>'Manage AInstallment', 'url'=>array('admin')),
);
?>

<h1>Ainstallments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
