<?php
/* @var $this CourseRegisterController */
/* @var $model CourseRegister */

$this->breadcrumbs=array(
	'Course Registers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CourseRegister', 'url'=>array('index')),
	array('label'=>'Create CourseRegister', 'url'=>array('create')),
	array('label'=>'View CourseRegister', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CourseRegister', 'url'=>array('admin')),
);
?>

<h1>Update CourseRegister <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>