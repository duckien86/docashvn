<?php
/* @var $this AThuChiController */
/* @var $model AThuChi */

$this->breadcrumbs = array(
	'Athu Chis' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'Quản lý thu chi', 'url' => array('admin')),
);
?>

<div class="x_panel">
	<div class="x_title">
		<h2><?php echo Yii::t('adm/actions', 'create') ?></h2>

		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<?php $this->renderPartial('_form', array('model' => $model)); ?>
	</div>
</div>