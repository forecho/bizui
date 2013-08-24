<h3><?php echo $model->bu_name; ?> #第 <?php echo $model->bu_id; ?> 位会员</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-striped'),
	'attributes'=>array(
		'bu_name',
		array(
            'name'=>t('bu_create_time', 'model'),
            'value'=>date('Y-m-d H:i',$model->bu_create_time),
        ),
        array(
            'name'=>t('bu_last_time', 'model'),
            'value'=>date('Y-m-d H:i',$model->bu_last_time),
        ),
		'bu_reputation',
		array(
            'name'=>t('bu_about', 'model'),
            'type'=>'ntext',
            'value'=>$model->bu_about,
        ),
	),
)); ?>
