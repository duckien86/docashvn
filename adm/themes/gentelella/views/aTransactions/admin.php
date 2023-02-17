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
'itemsCssClass' => 'table table-bordered table-striped table-hover jambo_table responsive-utilities',
'columns'=>array(
array (
  'name' => 'id',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'create_by',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'shop_id',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'customer',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'amount',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'note',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'type',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'group_id',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'create_date',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'ref_id',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'status',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'extra_param_1',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'extra_param_2',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'extra_param_3',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array(
'class'=>'booster.widgets.TbButtonColumn',
'template' => '{update}{delete}',
'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
),
),
)); ?>