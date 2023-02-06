<?php
/* @var $this FaqController */
/* @var $model Faq */




Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#faq-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Danh sách yêu cầu tư vấn</h1>


<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'faq-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		// 'id',
		'name',
		'email',
		'mobile',
		'address',
		'content',
		array(
			'class'       => 'booster.widgets.TbButtonColumn',
			'htmlOptions' => array('width' => '100px', 'style' => 'text-align: center;vertical-align:middle;'),
		),
	),
)); ?>