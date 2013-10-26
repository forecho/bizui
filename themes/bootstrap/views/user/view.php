<h3><?php echo $model->bu_name; ?> #第 <?php echo $model->bu_id; ?> 位会员</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-striped table-bordered'),
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



<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><?php echo t('newPosts', 'main'); ?></div>
    <!-- List group -->
    <ul class="list-group">
    <?php foreach ($posts as $key => $value) { ?>
        <li class="list-group-item">
            <?php echo CHtml::link($value->bp_title, array('/posts/view','id'=>$value->bp_id), array('title'=>$value->bp_title.' '.tranTime($value->bp_create_time))); ?>
        </li>
    <?php  } ?>
    </ul>
</div>