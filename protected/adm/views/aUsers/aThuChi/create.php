<?php
/* @var $this AThuChiController */
/* @var $model AThuChi */

$this->breadcrumbs=array(
	'Athu Chis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AThuChi', 'url'=>array('index')),
	array('label'=>'Manage AThuChi', 'url'=>array('admin')),
);
?>

<h1>Create AThuChi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>