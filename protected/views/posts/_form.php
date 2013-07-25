<?php
/* @var $this PostsController */
/* @var $model Posts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'posts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_title'); ?>
		<?php echo $form->textField($model,'bp_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bp_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_url'); ?>
		<?php echo $form->textField($model,'bp_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bp_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_content'); ?>
		<?php echo $form->textArea($model,'bp_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bp_content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->