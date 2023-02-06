<?php
/* @var $this CourseRegisterController */
/* @var $model CourseRegister */

$this->breadcrumbs=array(
	'Course Registers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CourseRegister', 'url'=>array('index')),
	array('label'=>'Create CourseRegister', 'url'=>array('create')),
	array('label'=>'Update CourseRegister', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CourseRegister', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CourseRegister', 'url'=>array('admin')),
);
?>

<h1>View CourseRegister #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'mobile',
		'address',
		'course_id',
		'user_id',
	),
)); ?>
