<?php
/* @var $this AThuChiController */
/* @var $data AThuChi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cua_hang_id')); ?>:</b>
	<?php echo CHtml::encode($data->cua_hang_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nhan_vien_id')); ?>:</b>
	<?php echo CHtml::encode($data->nhan_vien_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('so_tien')); ?>:</b>
	<?php echo CHtml::encode($data->so_tien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ghi_chu')); ?>:</b>
	<?php echo CHtml::encode($data->ghi_chu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loai_giao_dich')); ?>:</b>
	<?php echo CHtml::encode($data->loai_giao_dich); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nhom_id')); ?>:</b>
	<?php echo CHtml::encode($data->nhom_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ngay_tao')); ?>:</b>
	<?php echo CHtml::encode($data->ngay_tao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trang_thai')); ?>:</b>
	<?php echo CHtml::encode($data->trang_thai); ?>
	<br />

	*/ ?>

</div>