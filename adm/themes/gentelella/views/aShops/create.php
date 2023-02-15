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
<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h3>Tạo mới AShops</h3>
			</div>
			<div class="clearfix"></div>
			<div class="x_content">

				<?php $this->renderPartial('_form', array('model'=>$model)); ?>			</div>
		</div>
	</div>
</div>