<?php
/* @var $this CourseRegisterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Course Registers',
);

$this->menu=array(
	array('label'=>'Create CourseRegister', 'url'=>array('create')),
	array('label'=>'Manage CourseRegister', 'url'=>array('admin')),
);
?>

<h1>Course Registers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
