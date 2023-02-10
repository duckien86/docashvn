<?php
/* @var $this AThuChiController */
/* @var $model AThuChi */

$this->breadcrumbs = array(
	'Athu Chis' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'Tạo mới', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#athu-chi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lý thu chi</h1>

<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); 
?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', array(
		'model' => $model,
	)); ?>
</div>
<!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'athu-chi-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		// 'id',
		// 'cua_hang_id',
		'ngay_tao',
		'nhan_vien_id',
		'khach_hang',
		'nhom_id',
		'so_tien',
		'ghi_chu',
		// 'loai_giao_dich',
		// 'trang_thai',
		// array(
		// 	// 'header'      => '',
		// 	'class'       => 'booster.widgets.TbButtonColumn',
		// 	'template'    => '{delete}',
		// 	'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'width:100px;text-align:center;vertical-align:middle;padding:10px'),
		// ),
		array(
			'header' => '',
			'type' => 'html',
			'value' => function ($data) {
				$url = Yii::app()->controller->createUrl('aThuChi/huy-phieu', array('id' => $data->id));
				return CHtml::link('<i class="glyphicon glyphicon-trash"></i>', $url);
			},
		),


	),
)); ?>