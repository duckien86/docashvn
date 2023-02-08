<?php
/* @var $this AThuChiController */
/* @var $model AThuChi */

$this->breadcrumbs=array(
	'Athu Chis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AThuChi', 'url'=>array('index')),
	array('label'=>'Create AThuChi', 'url'=>array('create')),
	array('label'=>'View AThuChi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AThuChi', 'url'=>array('admin')),
);
?>

<h1>Update AThuChi <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>