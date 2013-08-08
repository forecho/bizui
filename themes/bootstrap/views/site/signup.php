<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ' . $this->pageTitle;
$this->breadcrumbs=array(
	'Sign Up',
);
?>

<h1>注册</h1>

<p><?php echo t('signup_message', 'model'); ?></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableAjaxValidation' => true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_name'); ?>
		<?php echo $form->textField($model,'bu_name'); ?>
		<?php echo $form->error($model,'bu_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_email'); ?>
		<?php echo $form->textField($model,'bu_email'); ?>
		<?php echo $form->error($model,'bu_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_password'); ?>
		<?php echo $form->passwordField($model,'bu_password'); ?>
		<?php echo $form->error($model,'bu_password'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
		<p class="ml120"><?php $this->widget('CCaptcha')?></p>
	<?php endif; ?>

	<p class="ml120">
		<?php echo CHtml::activeCheckBox($model, 'agreement', array('id'=>'agreement', 'tabindex'=>5));?>
		<?php echo t('agreement', 'model', array('{policyurl}'=>aurl('static/policy')));?>
	    <?php echo $form->error($model,'agreement');?>
    </p>


	<div class="buttons ml120">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
