<?php
/* @var $this PostsController */
/* @var $model Posts */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->bp_id=>array('view','id'=>$model->bp_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Posts', 'url'=>array('index')),
	array('label'=>'Create Posts', 'url'=>array('create')),
	array('label'=>'View Posts', 'url'=>array('view', 'id'=>$model->bp_id)),
	array('label'=>'Manage Posts', 'url'=>array('admin')),
);
?>

<h1>Update Posts <?php echo $model->bp_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>