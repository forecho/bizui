<?php
/* @var $this OptionsController */
/* @var $model Options */

$this->breadcrumbs=array(
	'Options'=>array('index'),
	$model->bo_name,
);

$this->menu=array(
	array('label'=>'List Options', 'url'=>array('index')),
	array('label'=>'Create Options', 'url'=>array('create')),
	array('label'=>'Update Options', 'url'=>array('update', 'id'=>$model->bo_name)),
	array('label'=>'Delete Options', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bo_name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Options', 'url'=>array('admin')),
);
?>

<h1>View Options #<?php echo $model->bo_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bo_name',
		'bo_value',
	),
)); ?>
