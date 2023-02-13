<?php
/* @var $this ATransactionsController */
/* @var $model ATransactions */

$this->breadcrumbs=array(
	'Atransactions'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Tạo mới ATransactions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#atransactions-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Quản lý Atransactions</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
'id'=>'atransactions-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'user_id',
		'customer',
		'amount',
		'note',
		'type',
		/*
		'group_id',
		'create_date',
		'ref_id',
		'status',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'template' => '{update}{delete}',
'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
),
),
)); ?>