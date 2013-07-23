<?php
/* @var $this OptionsController */
/* @var $model Options */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'options-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bo_name'); ?>
		<?php echo $form->textField($model,'bo_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'bo_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bo_value'); ?>
		<?php echo $form->textArea($model,'bo_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bo_value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->