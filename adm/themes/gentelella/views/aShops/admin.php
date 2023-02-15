<?php
/* @var $this AShopsController */
/* @var $model AShops */

$this->breadcrumbs = array(
  'Ashops' => array('index'),
  'Manage',
);

$this->menu = array(
  array('label' => 'Tạo mới AShops', 'url' => array('create')),
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

<h1>Quản lý Cửa Hàng</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
  <?php $this->renderPartial('_search', array(
    'model' => $model,
  )); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
  'id' => 'ashops-grid',
  'dataProvider' => $model->search(),
  // 'filter' => $model,
  'itemsCssClass' => 'table table-bordered table-striped table-hover jambo_table responsive-utilities',
  'columns' => array(
    array(
      'name' => 'id',
      'type' => 'raw',
      'htmlOptions' =>
      array(
        'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
      ),
    ),
    array(
      'name' => 'name',
      'type' => 'raw',
      'htmlOptions' =>
      array(
        'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
      ),
    ),
    array(
      'name' => 'note',
      'type' => 'raw',
      'htmlOptions' =>
      array(
        'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
      ),
    ),
    array(
      'name' => 'create_date',
      'type' => 'raw',
      'htmlOptions' =>
      array(
        'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
      ),
    ),
    array(
      'name' => 'create_by',
      'type' => 'raw',
      'htmlOptions' =>
      array(
        'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
      ),
    ),
    array(
      'name' => 'owner',
      'type' => 'raw',
      'htmlOptions' =>
      array(
        'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
      ),
    ),
    array(
      'name' => 'status',
      'type' => 'raw',
      'htmlOptions' =>
      array(
        'style' => 'width:150px;word-break: break-word;vertical-align:middle;',
      ),
    ),
    array(
      'class' => 'booster.widgets.TbButtonColumn',
      'template' => '{update}{delete}',
      'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
    ),
  ),
)); ?>