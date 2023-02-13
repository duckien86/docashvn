<?php

/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>


<?php echo "<?php \$form=\$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => ['class' => 'form-horizontal form-label-left'],
	)); ?>\n"; ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach ($this->tableSchema->columns as $column) {
	if ($column->autoIncrement)
		continue;
?>
	<div class="form-group">
		<?php echo "<?php echo " . $this->generateActiveLabel($this->modelClass, $column, ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) . "; ?>\n"; ?>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column, ['class' => 'form-control col-md-7 col-xs-12']) . "; ?>\n"; ?>
		</div>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
	</div>

<?php
}
?>
<div class="form-group buttons">
	<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Tạo mới' : 'Lưu lại',['class'=>'btn btn-primary']); ?>\n"; ?>
</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>