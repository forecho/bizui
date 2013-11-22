<?php
/* @var $this SiteController */
/* @var $data Posts */
?>
<div class="col-xs-6 <?php echo ($index==0||$index==1)?'':'mt20'; ?>">
	<div class="thumbnail h370">
		<div class="video-thumb" data-toggle="modal" data-target="#myModal<?php echo $index;?>">
			<?php if ($data->bp_img_url){ ?>
				<img alt="300x200" src="<?php echo $data->bp_img_url?>">
			<?php } else{?>
				<img alt="300x200" src="http://g1.ykimg.com/1100641F46521A87005D41050A79452D1FFDAF-841F-C115-3BE7-5AC0EE39EE0C">
			<?php } ?>
			<i class="video-play-icon"></i>
		</div>
		<div class="caption">
			<p>
				<?php echo CHtml::link($data->bp_title, $data->bp_url, array('target'=>'_blank', 'class'=>'post-title'));?>
				<span>(<?php echo GetDomain($data->bp_url); ?>)</span>
			</p>
			<p>
				<span><?php echo $data->bp_like; ?></span>个赞
				来自 <?php echo CHtml::link($data->user->bu_name, array('/user/view', 'id'=>$data->bu_id)); ?>
				<?php echo tranTime($data->bp_create_time); ?>
				|
				<?php echo CHtml::link(Comments::model()->Count('bp_id='.$data->bp_id).'条评论', array('/posts/view', 'id'=>$data->bp_id)); ?>
			</p>
		</div>
		<p class="ml10">
			<?php if (Yii::app()->user->id) {
				$saveCount = Save::model()->countByAttributes(array('bp_id'=>$data->bp_id, 'bu_id'=>Yii::app()->user->id, 'type'=>'1'));
				//判断是否是自己发布的
				if ($data->bu_id==Yii::app()->user->id) {
			?>
				<span class="btn btn-success" role="button"><i class="glyphicon glyphicon-send"></i>自己</span>
			<?php
				//判断是否是已经收藏的
				}elseif ($saveCount==1) {
			?>
				<span class="btn btn-danger" role="button"><i class="glyphicon glyphicon-star"></i>已赞</span>
			<?php
				}else{
			?>
				<span onclick="getScore('<?php echo $data->bp_id; ?>',this)" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-thumbs-up"></i>点赞</span>
			<?php
				}
			}else{
			?>
				<span onclick="getScore('<?php echo $data->bp_id; ?>',this)" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-thumbs-up"></i>点赞</span>
			<?php } ?>
			
			<a href="#" class="btn btn-default" role="button">Button</a>
		</p>
	</div>
</div>

<div class="modal fade" id="myModal<?php echo $index;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $data->bp_title; ?></h4>
			</div>
			<div class="modal-body">
				<?php if($data->bp_video_url): ?>
					<object type="application/x-shockwave-flash" data="<?php echo $data->bp_video_url; ?>" width="100%" height="520px">
						<param name="movie" value="<?php echo $data->bp_video_url; ?>">
					</object>
				<?php endif; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

