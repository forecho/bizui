<?php
/* @var $this OptionsController */
/* @var $model Options */

$this->breadcrumbs=array(
	'Options'=>array('index'),
	$model->bo_name=>array('view','id'=>$model->bo_name),
	'Update',
);

$this->menu=array(
	array('label'=>'List Options', 'url'=>array('index')),
	array('label'=>'Create Options', 'url'=>array('create')),
	array('label'=>'View Options', 'url'=>array('view', 'id'=>$model->bo_name)),
	array('label'=>'Manage Options', 'url'=>array('admin')),
);
?>

<h1>Update Options <?php echo $model->bo_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>