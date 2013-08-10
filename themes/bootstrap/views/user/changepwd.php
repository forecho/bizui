<?php
/* @var $this UserController */
/* @var $model User */

// $this->breadcrumbs=array(
// 	'Users'=>array('index'),
// 	$model->bu_id=>array('view','id'=>$model->bu_id),
// 	'Update',
// );
?>

<div class="form-group">
	<div class="col-lg-offset-2 col-lg-10">
		<h3><?php echo t('change_password','main'); ?></h3>
	</div>
</div>
</br>


<?php if(Yii::app()->user->hasFlash('error')): ?>  
	<div class="flash-error">  
	    <?php echo Yii::app()->user->getFlash('error'); ?>  
	</div>  
<?php endif;?>

<?php if(Yii::app()->user->hasFlash('success')): ?>  
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?> 
	</div>
<?php endif;?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
	)
)); ?>

	
	<div class="form-group">
		<?php echo $form->labelEx($model,'password_current', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-4">
			<?php echo $form->passwordField($model,'password_current', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'password_current'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-4">
			<?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password_again', array('class'=>'col-lg-2 control-label')); ?>
		<div class="col-lg-4">
			<?php echo $form->passwordField($model,'password_again', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'password_again'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<?php echo CHtml::submitButton(t('change_password','main'), array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->