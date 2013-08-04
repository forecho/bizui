<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->bu_id,
);

$this->menu=array(
	array('label'=>t('update_user', 'model'), 'url'=>array('update')),
	array('label'=>t('change_password', 'model'), 'url'=>array('changepwd')),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>t('manage_user', 'model'), 'url'=>array('admin')),
);
?>

<h3><?php echo $model->bu_name; ?> #第 <?php echo $model->bu_id; ?> 位会员</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bu_name',
		array(
            'name'=>t('bu_create_time', 'model'),
            'value'=>date('Y-m-d H:i',$model->bu_create_time),
        ),
		'bu_reputation',
		array(
            'name'=>t('bu_about', 'model'),
            'type'=>'ntext',
            'value'=>$model->bu_about,
        ),
	),
)); ?>
