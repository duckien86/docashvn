<?php
/* @var $this CourseController */
/* @var $model Course */

$this->menu = array(
	array('label' => 'Tạo mới', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#course-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Quản lý khóa học</h3>

<?php echo CHtml::link('Tìm kiếm', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'course-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'price',
		'thumnail',
		'description',
		array(
			'class'       => 'booster.widgets.TbButtonColumn',
			'htmlOptions' => array('width' => '100px', 'style' => 'text-align: center;vertical-align:middle;'),
		),
	),
)); ?>