<?php
/* @var $this ATransactionCategoryController */
/* @var $model ATransactionCategory */

$this->breadcrumbs=array(
	'Atransaction Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Tạo mới ATransactionCategory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#atransaction-category-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Quản lý Atransaction Categories</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
'id'=>'atransaction-category-grid',
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
  'name' => 'name',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'in_out',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'code',
  'type' => 'raw',
  'htmlOptions' => 
  array (
    'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
  ),
)		,
array (
  'name' => 'sort_index',
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
array(
'class'=>'booster.widgets.TbButtonColumn',
'template' => '{update}{delete}',
'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
),
),
)); ?>