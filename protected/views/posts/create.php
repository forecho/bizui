<?php
/* @var $this PostsController */
/* @var $model Posts */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Posts', 'url'=>array('index')),
	array('label'=>'Manage Posts', 'url'=>array('admin')),
);
?>

<h1>Create Posts</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>