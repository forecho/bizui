<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->bu_id=>array('view','id'=>$model->bu_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->bu_id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->bu_id; ?></h1>


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
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'password_current'); ?>
		<?php echo $form->passwordField($model,'password_current',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'password_current'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_again'); ?>
		<?php echo $form->passwordField($model,'password_again',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'password_again'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->