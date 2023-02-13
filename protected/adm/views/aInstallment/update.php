<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */

$this->breadcrumbs=array(
	'Ainstallments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
array('label'=>'Thêm mới AInstallment', 'url'=>array('create')),
array('label'=>'Quản lý AInstallment', 'url'=>array('admin')),
);
?>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h1>Cập nhật AInstallment</h1>
			</div>
			<div class="clearfix"></div>
			<div class="x_content">

				<?php $this->renderPartial('_form', array('model'=>$model)); ?>			</div>
		</div>
	</div>
</div>