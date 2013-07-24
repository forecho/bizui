<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bu_id'); ?>
		<?php echo $form->textField($model,'bu_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_email'); ?>
		<?php echo $form->textField($model,'bu_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_name'); ?>
		<?php echo $form->textField($model,'bu_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_reg_ip'); ?>
		<?php echo $form->textField($model,'bu_reg_ip',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_last_ip'); ?>
		<?php echo $form->textField($model,'bu_last_ip',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_last_time'); ?>
		<?php echo $form->textField($model,'bu_last_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_create_time'); ?>
		<?php echo $form->textField($model,'bu_create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bu_status'); ?>
		<?php echo $form->textField($model,'bu_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->