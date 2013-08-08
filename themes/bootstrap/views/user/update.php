<?php
/* @var $this UserController */
/* @var $model User */

// $this->breadcrumbs=array(
// 	'Users'=>array('index'),
// 	$model->bu_id=>array('view','id'=>$model->bu_id),
// 	'Update',
// );
?>

<h1>Update User <?php echo $model->bu_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>