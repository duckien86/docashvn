<?php
/* @var $this AThuChiController */
/* @var $model AThuChi */

$this->breadcrumbs=array(
	'Athu Chis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AThuChi', 'url'=>array('index')),
	array('label'=>'Create AThuChi', 'url'=>array('create')),
	array('label'=>'Update AThuChi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AThuChi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AThuChi', 'url'=>array('admin')),
);
?>

<h1>View AThuChi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cua_hang_id',
		'nhan_vien_id',
		'so_tien',
		'ghi_chu',
		'loai_giao_dich',
		'nhom_id',
		'ngay_tao',
		'trang_thai',
	),
)); ?>
