<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs = array(
	'Courses' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Course', 'url' => array('index')),
	array('label' => 'Manage Course', 'url' => array('admin')),
);
?>

<h3>Tạo mới</h3>

<?php $this->renderPartial('_form', array('model' => $model)); ?>