<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_email'); ?>
		<?php echo $form->textField($model,'bu_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bu_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_name'); ?>
		<?php echo $form->textField($model,'bu_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'bu_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_password'); ?>
		<?php echo $form->textField($model,'bu_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bu_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_reg_ip'); ?>
		<?php echo $form->textField($model,'bu_reg_ip',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'bu_reg_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_last_ip'); ?>
		<?php echo $form->textField($model,'bu_last_ip',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'bu_last_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_last_time'); ?>
		<?php echo $form->textField($model,'bu_last_time'); ?>
		<?php echo $form->error($model,'bu_last_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_create_time'); ?>
		<?php echo $form->textField($model,'bu_create_time'); ?>
		<?php echo $form->error($model,'bu_create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_status'); ?>
		<?php echo $form->textField($model,'bu_status'); ?>
		<?php echo $form->error($model,'bu_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->