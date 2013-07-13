<?php
/* @var $this PostsController */
/* @var $model Posts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bp_id'); ?>
		<?php echo $form->textField($model,'bp_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_id'); ?>
		<?php echo $form->textField($model,'bu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bp_title'); ?>
		<?php echo $form->textField($model,'bp_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bp_url'); ?>
		<?php echo $form->textField($model,'bp_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bp_video_url'); ?>
		<?php echo $form->textField($model,'bp_video_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bp_content'); ?>
		<?php echo $form->textField($model,'bp_content',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bp_score'); ?>
		<?php echo $form->textField($model,'bp_score',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bp_like'); ?>
		<?php echo $form->textField($model,'bp_like'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_create_time'); ?>
		<?php echo $form->textField($model,'bu_create_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->