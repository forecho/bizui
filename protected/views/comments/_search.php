<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bc_id'); ?>
		<?php echo $form->textField($model,'bc_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bp_id'); ?>
		<?php echo $form->textField($model,'bp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_id'); ?>
		<?php echo $form->textField($model,'bu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bc_text'); ?>
		<?php echo $form->textArea($model,'bc_text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bc_status'); ?>
		<?php echo $form->textField($model,'bc_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bc_parent'); ?>
		<?php echo $form->textField($model,'bc_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bc_create_time'); ?>
		<?php echo $form->textField($model,'bc_create_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->