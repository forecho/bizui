<?php
/* @var $this SaveController */
/* @var $model Save */

$this->breadcrumbs=array(
	'Saves'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Save', 'url'=>array('index')),
	array('label'=>'Create Save', 'url'=>array('create')),
	array('label'=>'Update Save', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Save', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Save', 'url'=>array('admin')),
);
?>

<h1>View Save #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'bu_id',
		'bp_id',
	),
)); ?>
