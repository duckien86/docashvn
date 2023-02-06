<?php
/* @var $this CourseRegisterController */
/* @var $model CourseRegister */

$this->breadcrumbs = array(
	'Course Registers' => array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#course-register-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Danh sách học viên đăng ký</h1>


<?php //echo CHtml::link('Tim kiem', '#', array('class' => 'search-button')); 
?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'course-register-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'email',
		'mobile',
		'address',
		'course_id',
		/*
		'user_id',
		*/
		// array(
		// 	'class'=>'CButtonColumn',
		// ),
	),
)); ?>