<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=$this->pageTitle. ' - ' . Yii::app()->name ;
?>

<div class="form-group">
	<div class="col-lg-offset-2 col-lg-10">
		<h3><?php echo t('Login','main'); ?></h3>
	</div>
</div>
</br>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
	)
)); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'bu_email', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-4">
			<?php echo $form->textField($model,'bu_email', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'bu_email'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'bu_password', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-4">
			<?php echo $form->passwordField($model,'bu_password', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'bu_password'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
			<?php echo CHtml::link(t('forgot_password', 'model'), array('reset'), array('class'=>'ml10')) ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<?php echo CHtml::submitButton(t('Login','main'), array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
