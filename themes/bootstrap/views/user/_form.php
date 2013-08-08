<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_name'); ?>
		<?php echo $form->textField($model,'bu_name',array('size'=>25,'maxlength'=>25,'disabled'=>'disabled')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_email'); ?>
		<?php echo $form->textField($model,'bu_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bu_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_about'); ?>
		<?php echo $form->textArea($model,'bu_about',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bu_about'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->