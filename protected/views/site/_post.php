<?php
/* @var $this SiteController */
/* @var $data Posts */
?>

<li class="box-item">
	<p>
		<span onclick="getScore('<?php echo $data->bp_id; ?>',this)"><img src="/images/grayarrow.png" width="12"></span>
		<?php echo CHtml::link($data->bp_title, $data->bp_url, array('target'=>'_blank', 'class'=>'post-title'));?>
		<span>(<?php echo GetDomain($data->bp_url); ?>)</span>
	</p>
	<p><span><?php echo $data->bp_like; ?></span>个赞
	来自 <?php echo CHtml::link($data->user->bu_name, array('/user/view', 'id'=>$data->bu_id)); ?>
	<?php echo tranTime($data->bp_create_time); ?>
	|
	<?php echo CHtml::link(Comments::model()->PostCommentsCount($data->bu_id).'条评论', array('/posts/view', 'id'=>$data->bp_id)); ?></p>
</li>