<?php
/* @var $this PostsController */
/* @var $model Posts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'posts-form',
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
		<?php echo $form->labelEx($model,'bp_title', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-6">
			<?php echo $form->textField($model,'bp_title', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'bp_title'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'bp_url', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-8">
			<?php echo $form->textField($model,'bp_url', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'bp_url'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'bp_content', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-8">
			<?php echo $form->textArea($model,'bp_content',array('rows'=>6,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'bp_content'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<?php echo CHtml::submitButton(t('create_posts','main'), array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->