<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=$this->pageTitle. ' - ' . Yii::app()->name ;
?>

<div class="form-group">
	<div class="col-lg-offset-2 col-lg-10">
		<h3><?php echo t('find_password','main'); ?></h3>
	</div>
</div>
</br>

<?php if(Yii::app()->user->hasFlash('error')): ?>  
	</br>
	</br>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
	    <?php echo Yii::app()->user->getFlash('error'); ?>  
	</div>  
<?php endif;?>

<?php if(Yii::app()->user->hasFlash('success')): ?> 
	</br>
	</br> 
	<div class="alert alert-success">
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
				<?php echo CHtml::submitButton(t('Send', 'main'), array('class'=>'btn btn-default')); ?>
			</div>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
<?php endif;?>