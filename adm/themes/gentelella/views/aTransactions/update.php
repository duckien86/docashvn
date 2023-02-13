<?php
/* @var $this ATransactionsController */
/* @var $model ATransactions */

$this->breadcrumbs=array(
	'Atransactions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
array('label'=>'Thêm mới ATransactions', 'url'=>array('create')),
array('label'=>'Quản lý ATransactions', 'url'=>array('admin')),
);
?>


<div class="x_panel">
	<div class="x_title">
		<h1>Update ATransactions <?php echo $model->id; ?></h1>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>