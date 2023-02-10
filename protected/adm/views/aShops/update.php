<?php
/* @var $this AShopsController */
/* @var $model AShops */

$this->breadcrumbs=array(
	'Ashops'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
array('label'=>'Thêm mới AShops', 'url'=>array('create')),
array('label'=>'Quản lý AShops', 'url'=>array('admin')),
);
?>


<div class="x_panel">
	<div class="x_title">
		<h1>Update AShops <?php echo $model->id; ?></h1>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>