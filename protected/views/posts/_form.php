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

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_id'); ?>
		<?php echo $form->textField($model,'bu_id'); ?>
		<?php echo $form->error($model,'bu_id'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'bp_video_url'); ?>
		<?php echo $form->textField($model,'bp_video_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bp_video_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_content'); ?>
		<?php echo $form->textField($model,'bp_content',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bp_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_score'); ?>
		<?php echo $form->textField($model,'bp_score',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bp_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_like'); ?>
		<?php echo $form->textField($model,'bp_like'); ?>
		<?php echo $form->error($model,'bp_like'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bp_create_time'); ?>
		<?php echo $form->textField($model,'bp_create_time'); ?>
		<?php echo $form->error($model,'bp_create_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->