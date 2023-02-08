<?php
/* @var $this ATransactionsController */
/* @var $model ATransactions */
/* @var $form CActiveForm */
?>
<div class="container-fluid">

	<div class="form-horizontal form-label-left">

		<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'atransactions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'id',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'id',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'id'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'user_id',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'user_id',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'user_id'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'customer',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'customer',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'customer'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'amount',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'amount',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'amount'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'note',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'note',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'note'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'type',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'type',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'type'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'group_id',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'group_id',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'group_id'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'create_date',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'create_date',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'create_date'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'ref_id',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'ref_id',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'ref_id'); ?>
			</div>

					<div class="form-group">
				<!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
				<?php echo $form->labelEx($model,'status',array (
  'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
)); ?>
				<!-- </div> -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php echo $form->textField($model,'status',array (
  'class' => 'form-control col-md-7 col-xs-12',
)); ?>
				</div>
				<?php echo $form->error($model,'status'); ?>
			</div>

				<div class="form-group buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Lưu lại',['class'=>'btn btn-primary']); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->
</div>