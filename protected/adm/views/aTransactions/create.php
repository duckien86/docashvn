<?php
/* @var $this ATransactionsController */
/* @var $model ATransactions */

$this->breadcrumbs=array(
	'Atransactions'=>array('index'),
	'Tạo mới',
);

$this->menu=array(
array('label'=>'Quản lý ATransactions', 'url'=>array('admin')),
);
?>
<div class="x_panel">
	<div class="x_title">
		<h1>Tạo mới ATransactions</h1>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>