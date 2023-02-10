<?php
/* @var $this AShopsController */
/* @var $model AShops */

$this->breadcrumbs=array(
	'Ashops'=>array('index'),
	'Tạo mới',
);

$this->menu=array(
array('label'=>'Quản lý AShops', 'url'=>array('admin')),
);
?>
<div class="x_panel">
	<div class="x_title">
		<h1>Tạo mới AShops</h1>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>