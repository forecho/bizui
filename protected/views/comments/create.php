<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Comments', 'url'=>array('index')),
	array('label'=>'Manage Comments', 'url'=>array('admin')),
);
?>

<h1>Create Comments</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>