<?php
/* @var $this PostsController */
/* @var $model Posts */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->bp_id,
);

$this->menu=array(
	array('label'=>'List Posts', 'url'=>array('index')),
	array('label'=>'Create Posts', 'url'=>array('create')),
	array('label'=>'Update Posts', 'url'=>array('update', 'id'=>$model->bp_id)),
	array('label'=>'Delete Posts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Posts', 'url'=>array('admin')),
);
?>

<h1>View Posts #<?php echo $model->bp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bp_id',
		'bu_id',
		'bp_title',
		'bp_url',
		'bp_video_url',
		'bp_content',
		'bp_score',
		'bp_like',
		'bp_create_time',
	),
)); ?>
