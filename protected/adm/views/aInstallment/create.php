<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */

$this->breadcrumbs=array(
	'Ainstallments'=>array('index'),
	'Tạo mới',
);

$this->menu=array(
array('label'=>'Quản lý AInstallment', 'url'=>array('admin')),
);
?>
<div class="x_panel">
	<div class="x_title">
		<h1>Tạo mới AInstallment</h1>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>