<?php
/* @var $this SiteController */
/* @var $data Posts */
?>

<li class="list-group-item <?php echo ($index==0)?'':'mt20'; ?>">
	<?php if ($data->bp_img_url): ?>
		<div class="video-thumb">
			<img src="<?php echo $data->bp_img_url?>">
			<i class="video-play-icon"></i>
		</div>
	<?php endif ?>
	<p>
		<?php if (Yii::app()->user->id) {
			$saveCount = Save::model()->countByAttributes(array('bp_id'=>$data->bp_id, 'bu_id'=>Yii::app()->user->id, 'type'=>'1'));
			//判断是否是自己发布的
			if ($data->bu_id==Yii::app()->user->id) {
		?>
			<span style="width:12px; color:red;">*</span>
		<?php
			//判断是否是已经收藏的
			}elseif ($saveCount==1) {
		?>
			<span><img src="<?php echo tbu();?>images/s.gif" width="12"></span>
		<?php
			}else{
		?>
			<span onclick="getScore('<?php echo $data->bp_id; ?>',this)"><img src="<?php echo tbu();?>images/grayarrow.png" width="12" title="赞"></span>
		<?php
			}
		}else{
		?>
			<span onclick="getScore('<?php echo $data->bp_id; ?>',this)"><img src="<?php echo tbu();?>images/grayarrow.png" width="12" title="赞"></span>
		<?php } ?>
		
		<?php echo CHtml::link($data->bp_title, $data->bp_url, array('target'=>'_blank', 'class'=>'post-title'));?>
		<span>(<?php echo GetDomain($data->bp_url); ?>)</span>
	</p>
	<p><span><?php echo $data->bp_like; ?></span>个赞
	来自 <?php echo CHtml::link($data->user->bu_name, array('/user/view', 'id'=>$data->bu_id)); ?>
	<?php echo tranTime($data->bp_create_time); ?>
	|
	<?php echo CHtml::link(Comments::model()->Count('bp_id='.$data->bp_id).'条评论', array('/posts/view', 'id'=>$data->bp_id)); ?></p>

</li>
<?php if($data->bp_video_url): ?>
<object type="application/x-shockwave-flash" data="<?php echo $data->bp_video_url; ?>" width="100%" height="520px">
    <param name="movie" value="<?php echo $data->bp_video_url; ?>">
</object>
<?php endif; ?>