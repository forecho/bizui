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

<p>Please fill out the following form with your signup credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_email'); ?>
		<?php echo $form->textField($model,'bu_email'); ?>
		<?php echo $form->error($model,'bu_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_name'); ?>
		<?php echo $form->textField($model,'bu_name'); ?>
		<?php echo $form->error($model,'bu_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bu_password'); ?>
		<?php echo $form->passwordField($model,'bu_password'); ?>
		<?php echo $form->error($model,'bu_password'); ?>
	</div>

	<?php echo CHtml::activeCheckBox($model, 'agreement', array('id'=>'agreement', 'tabindex'=>5));?>
	<label for="agreement">
	<?php echo t('agreement', 'main', array('{policyurl}'=>aurl('static/policy')));?></label>
    <?php if ($model->hasErrors('agreement')):?>
    	<span class="beta-help-inline"><?php echo $form->getError('agreement');?></span>
    <?php endif;?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
