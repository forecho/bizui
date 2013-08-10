<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
	)
)); ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'bu_name', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-4">
			<p class="form-control-static"><?php echo $model->bu_name; ?> </p>
			<?php  // echo $form->textField($model,'bu_name', array('class'=>'form-control')); ?>
			<?php // echo $form->error($model,'bu_name'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'bu_email', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-4">
			<?php echo $form->textField($model,'bu_email', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'bu_email'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'bu_about', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-8">
			<?php echo $form->textArea($model,'bu_about',array('rows'=>6,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'bu_about'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<?php echo CHtml::submitButton(t('Save','main'), array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->