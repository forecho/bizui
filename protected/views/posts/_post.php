<?php
/* @var $this SiteController */
/* @var $data Posts */
?>

<li class="box-item <?php echo ($index==0)?'':'mt20'; ?>">
	<p>
		<?php if (Yii::app()->user->id) {
			$saveCount = Save::model()->countByAttributes(array('bp_id'=>$data->bp_id, 'bu_id'=>Yii::app()->user->id, 'type'=>'1'));
			//判断是否是自己发布的
			if ($data->posts->user->bu_id==Yii::app()->user->id) {
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
		
		<?php echo CHtml::link($data->posts->bp_title, $data->posts->bp_url, array('target'=>'_blank', 'class'=>'post-title'));?>
		<span>(<?php echo GetDomain($data->posts->bp_url); ?>)</span>
	</p>
	<p><span><?php echo $data->posts->bp_like; ?></span>个赞
	来自 <?php echo CHtml::link($data->posts->user->bu_name, array('/user/view', 'id'=>$data->bu_id)); ?>
	<?php echo tranTime($data->posts->bp_create_time); ?>
	|
	<?php echo CHtml::link(Comments::model()->Count('bp_id='.$data->bp_id).'条评论', array('/posts/view', 'id'=>$data->bp_id)); ?></p>
</li>