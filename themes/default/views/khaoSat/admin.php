<?php
/* @var $this CongtyController */
/* @var $model Congty */

$this->breadcrumbs=array(
	'Nhân sự'=>array('admin'),
	'Danh sách khảo sát',
);

// $this->menu=array(
// 	// array('label'=>'List Congty', 'url'=>array('index')),
// 	array('label'=>'Tạo mới', 'url'=>array('create')),
// );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#congty-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lý Nhân sự</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
// $this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'congty-grid',
// 	'dataProvider'=>$model->search(),
// 	'filter'=>$model,
// 	'columns'=>array(
// 		'id',
// 		'ma',
// 		'ten',
// 		'idcongtycha',
// 		'enabled',
// 		'createtime',
// 		/*
// 		'createuser',
// 		'edittime',
// 		'edituser',
// 		*/
// 		array(
// 			'class'=>'CButtonColumn',
// 		),
// 	),
// )); 
?>
<div class="row">  
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <!-- <h2><?= Yii::t('adm/label', 'list_categories') ?></h2> -->
                <div class="clearfix" >
                	<h2>Danh sách các khảo sát</h2>
                </div>
                <div class="clearfix" >
  <!--               	<button type="submit" class="btn btn-success" onclick="location.href = 'create';">Tạo mới</button>
					<button type="submit" class="btn btn-success" onclick="location.href = 'upload';">Upload</button> -->
                </div>
            </div>
			<!-- <div class="item form-group">
				<div class="">
				
				<button type="submit" class="btn btn-success">Tạo mới</button>
				<button type="submit" class="btn btn-success">Đồng bộ</button>
				</div>
			</div> -->
            <!-- <div class="ln_solid"></div> -->
            <div class="x_content">
                <div class="pull-right">
                    <?php //echo CHtml::link(Yii::t('adm/label', 'create'), array('create'), array('class' => 'btn btn-warning')); ?>
                </div>
                <div class="clearfix"></div>

                <?php $this->widget('booster.widgets.TbGridView', array(
                    'id'=>'requests-grid',
                    'dataProvider'=>$model->search(),
					'filter'=>$model,
					// 'type' => 'striped bordered condensed',
					'template'=>"{items}",
                    'columns'=>array(
						array('name'=>'id', 'header'=>'ID', 'filter' => false),
						array(
							'name'=>'ten_khao_sat',
							'header'=>'Tên khảo sát',
							'htmlOptions'=>array(
								// 'width'=>'100'
							),
							'type'=>'raw', 
							'value' => 'CHtml::link($data->ten_khao_sat, Yii::app()
 ->createUrl("/khaoSat/thuchienkhaosat",array("id"=>$data->primaryKey)))',
							// 'width' =>10
 							'filter' => false
						),
						array (
							'header'=>'Trạng thái',
							'value' => 'Chưa khảo sát'
						),
						array (
							'header'=>'Kết quả',
							'value' => 'Chưa khảo sát',
							'type'=>'raw', 
							'value' => 'CHtml::link("Xem kết quả", Yii::app()
 ->createUrl("/khaoSat/ketquakhaosat",array("id"=>$data->primaryKey)))',
						),
						// array('name'=>'username', 'header'=>'Username'),
						
						// array('name'=>'chuc_danh', 'header'=>'Chức danh'),
						// array('name'=>'que_quan', 'header'=>'Quê quán'),
                        // 'id',
                    //    'name',
                    //    'chucdanh',
                    //    'email',
					//    'mobile',
						array(
							'class'       => 'booster.widgets.TbButtonColumn',
							'template'    => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
							'htmlOptions' => array('nowrap' => 'nowrap', 'width' => '1%', 'style' => 'text-align:center;vertical-align:middle;padding:10px'),
						),

                    ),
                )); ?>
            </div>
        </div>
    </div>
</div>