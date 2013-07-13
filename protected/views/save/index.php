<?php
/* @var $this SaveController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Saves',
);

$this->menu=array(
	array('label'=>'Create Save', 'url'=>array('create')),
	array('label'=>'Manage Save', 'url'=>array('admin')),
);
?>

<h1>Saves</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
