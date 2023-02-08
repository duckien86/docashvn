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
	'Tạo mới',
);\n";
?>

$this->menu=array(
array('label'=>'Quản lý <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>
<div class="x_panel">
	<div class="x_title">
		<h1>Tạo mới <?php echo $this->modelClass; ?></h1>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
	</div>
</div>