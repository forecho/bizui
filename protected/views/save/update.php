<?php
/* @var $this SaveController */
/* @var $model Save */

$this->breadcrumbs=array(
	'Saves'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Save', 'url'=>array('index')),
	array('label'=>'Create Save', 'url'=>array('create')),
	array('label'=>'View Save', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Save', 'url'=>array('admin')),
);
?>

<h1>Update Save <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>