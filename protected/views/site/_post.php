<?php
/* @var $this SiteController */
/* @var $data Posts */
?>

<li class="box-item">
	<p>
		<?php if (Yii::app()->user->id) {
			$saveCount = Save::model()->countByAttributes(array('bp_id'=>$data->bp_id, 'bu_id'=>Yii::app()->user->id));
			if ($saveCount==1) {
		?>
			<span><img src="<?php echo bu();?>/images/s.gif" width="12"></span>
		<?php
			}else{
		?>
			<span onclick="getScore('<?php echo $data->bp_id; ?>',this)"><img src="<?php echo bu();?>/images/grayarrow.png" width="12" title="赞"></span>
		<?php
			}
		}else{
		?>
			<span onclick="getScore('<?php echo $data->bp_id; ?>',this)"><img src="<?php echo bu();?>/images/grayarrow.png" width="12" title="赞"></span>
		<?php } ?>
		
		<?php echo CHtml::link($data->bp_title, $data->bp_url, array('target'=>'_blank', 'class'=>'post-title'));?>
		<span>(<?php echo GetDomain($data->bp_url); ?>)</span>
	</p>
	<p><span><?php echo $data->bp_like; ?></span>个赞
	来自 <?php echo CHtml::link($data->user->bu_name, array('/user/view', 'id'=>$data->bu_id)); ?>
	<?php echo tranTime($data->bp_create_time); ?>
	|
	<?php echo CHtml::link(Comments::model()->PostCommentsCount($data->bu_id).'条评论', array('/posts/view', 'id'=>$data->bp_id)); ?></p>
</li>