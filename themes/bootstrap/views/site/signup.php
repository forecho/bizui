<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=$this->pageTitle. ' - ' . Yii::app()->name ;
?>

<div class="form-group">
	<div class="col-lg-offset-2 col-lg-10">
		<h3><?php echo t('Signup','main'); ?></h3>
	</div>
</div>
</br>
</br>
</br>

<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<?php echo t('signup_message', 'model'); ?>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableAjaxValidation' => true,
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
			<?php echo $form->textField($model,'bu_name', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'bu_name'); ?>
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
		<?php echo $form->labelEx($model,'bu_password', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-4">
			<?php echo $form->passwordField($model,'bu_password', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'bu_password'); ?>
		</div>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
		<div class="form-group">
		<?php echo $form->labelEx($model,'verifyCode', array('class'=>'col-lg-2 control-label')); ?>
			<div class="col-lg-4">
				<?php echo $form->textField($model,'verifyCode', array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'verifyCode'); ?>
			</div>
			<?php $this->widget('CCaptcha')?>
		</div>
	<?php endif; ?>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<?php echo CHtml::activeCheckBox($model, 'agreement', array('id'=>'agreement', 'tabindex'=>5));?>
			<?php echo t('agreement', 'model', array('{policyurl}'=>aurl('static/policy')));?>
	    	<?php echo $form->error($model,'agreement');?>
   		</div>
   	</div>


	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<?php echo CHtml::submitButton(t('Login', 'main'), array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
