<?php

/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
array('label'=>'Tạo mới <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Quản lý <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<?php echo "<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
	<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView', array(
'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'itemsCssClass' => 'table table-bordered table-striped table-hover jambo_table responsive-utilities',
'columns'=>array(
<?php


$count = 0;
foreach ($this->tableSchema->columns as $column) {
	$templateColumn =  [
		'name'        => $column->name,
		'type'        => 'raw',
		'htmlOptions' => ['style' => 'width:150px;word-break: break-word;vertical-align:middle;'],
	];

	echo "\t\t" . var_export($templateColumn) . ",\n";
}
?>
array(
'class'=>'booster.widgets.TbButtonColumn',
'template' => '{update}{delete}',
'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
),
),
)); ?>