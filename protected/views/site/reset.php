<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ' . $this->pageTitle;
$this->breadcrumbs=array(
	'Sign Up',
);
?>

<h1>找回密码</h1>

<?php if(Yii::app()->user->hasFlash('error')): ?>  
	<div class="flash-error">  
	    <?php echo Yii::app()->user->getFlash('error'); ?>  
	</div>  
<?php endif;?>

<?php if(Yii::app()->user->hasFlash('success')): ?>  
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?> 
	</div>

<?php else: ?>  
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'reset-form',
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

		<?php if(CCaptcha::checkRequirements()): ?>
			<?php echo $form->labelEx($model,'verifyCode'); ?>
			<?php echo $form->textField($model,'verifyCode'); ?>
			<?php echo $form->error($model,'verifyCode'); ?>
			<p class="ml120"><?php $this->widget('CCaptcha')?></p>
		<?php endif; ?>

		<div class="buttons ml120">
			<?php echo CHtml::submitButton('Send'); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
<?php endif;?>