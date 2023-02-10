<?php
/* @var $this AShopsController */
/* @var $model AShops */

$this->breadcrumbs=array(
	'Ashops'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Tạo mới AShops', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#ashops-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Quản lý Ashops</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
'id'=>'ashops-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'name',
		'note',
		'create_date',
		'create_by',
		'owner',
		/*
		'status',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'template' => '{update}{delete}',
'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
),
),
)); ?>