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
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
array('label'=>'Thêm mới <?php echo $this->modelClass; ?>', 'url'=>array('create')),
array('label'=>'Quản lý <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>


<div class="x_panel">
	<div class="x_title">
		<h1>Update <?php echo $this->modelClass . " <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
	</div>
</div>