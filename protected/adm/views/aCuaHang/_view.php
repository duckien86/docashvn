<?php
/* @var $this ACuaHangController */
/* @var $data ACuaHang */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ten')); ?>:</b>
	<?php echo CHtml::encode($data->ten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ghi_chu')); ?>:</b>
	<?php echo CHtml::encode($data->ghi_chu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ngay_tao')); ?>:</b>
	<?php echo CHtml::encode($data->ngay_tao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trang_thai')); ?>:</b>
	<?php echo CHtml::encode($data->trang_thai); ?>
	<br />


</div>