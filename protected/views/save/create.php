<?php
/* @var $this SaveController */
/* @var $model Save */

$this->breadcrumbs=array(
	'Saves'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Save', 'url'=>array('index')),
	array('label'=>'Manage Save', 'url'=>array('admin')),
);
?>

<h1>Create Save</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>