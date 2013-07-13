<?php
/* @var $this SaveController */
/* @var $model Save */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'save-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_id'); ?>
		<?php echo $form->textField($model,'bu_id'); ?>
		<?php echo $form->error($model,'bu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_id'); ?>
		<?php echo $form->textField($model,'bp_id'); ?>
		<?php echo $form->error($model,'bp_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->