<?php
/* @var $this AInstallmentController */
/* @var $model AInstallment */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
	)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model, 'id', array(
			'class' => 'control-label col-md-1 col-sm-1 col-xs-12',
		)); ?>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<?php echo $form->textField($model, 'id', array(
				'class' => 'form-control',
			)); ?>
			<?php echo $form->error($model, 'id'); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->