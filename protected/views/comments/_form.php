<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_id'); ?>
		<?php echo $form->textField($model,'bp_id'); ?>
		<?php echo $form->error($model,'bp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_id'); ?>
		<?php echo $form->textField($model,'bu_id'); ?>
		<?php echo $form->error($model,'bu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bc_text'); ?>
		<?php echo $form->textArea($model,'bc_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bc_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bc_status'); ?>
		<?php echo $form->textField($model,'bc_status'); ?>
		<?php echo $form->error($model,'bc_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bc_parent'); ?>
		<?php echo $form->textField($model,'bc_parent'); ?>
		<?php echo $form->error($model,'bc_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bc_create_time'); ?>
		<?php echo $form->textField($model,'bc_create_time'); ?>
		<?php echo $form->error($model,'bc_create_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->