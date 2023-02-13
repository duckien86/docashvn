<?php
/* @var $this ATransactionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Atransactions',
);

$this->menu=array(
	array('label'=>'Create ATransactions', 'url'=>array('create')),
	array('label'=>'Manage ATransactions', 'url'=>array('admin')),
);
?>

<h1>Atransactions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
