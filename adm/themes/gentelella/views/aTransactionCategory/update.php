<?php
/* @var $this ATransactionCategoryController */
/* @var $model ATransactionCategory */

$this->breadcrumbs=array(
	'Atransaction Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
array('label'=>'Thêm mới ATransactionCategory', 'url'=>array('create')),
array('label'=>'Quản lý ATransactionCategory', 'url'=>array('admin')),
);
?>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h3>Cập nhật ATransactionCategory</h3>
			</div>
			<div class="clearfix"></div>
			<div class="x_content">

				<?php $this->renderPartial('_form', array('model'=>$model)); ?>			</div>
		</div>
	</div>
</div>