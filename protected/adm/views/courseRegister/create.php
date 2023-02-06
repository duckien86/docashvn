<?php
/* @var $this CourseRegisterController */
/* @var $model CourseRegister */

$this->breadcrumbs=array(
	'Course Registers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CourseRegister', 'url'=>array('index')),
	array('label'=>'Manage CourseRegister', 'url'=>array('admin')),
);
?>

<h1>Create CourseRegister</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>