<?php foreach ($comments as $key => $data) { ?>
<li class="box-item">
	<p>
		<?php if (Yii::app()->user->id) {
			$postCount = Posts::model()->countByAttributes(array('bp_id'=>$data->bp_id, 'bu_id'=>Yii::app()->user->id));
			$saveCount = Save::model()->countByAttributes(array('bp_id'=>$data->bp_id, 'bu_id'=>Yii::app()->user->id));
			//判断是否是自己发布的
			if ($postCount==1) {
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
		<span><?php echo $data->bc_like; ?></span>个赞
		来自 <?php echo CHtml::link($data->user->bu_name, array('/user/view', 'id'=>$data->bu_id)); ?>
		<?php echo tranTime($data->bc_create_time); ?>
		|
		<?php echo CHtml::link('查看', array('/comments/view', 'id'=>$data->bc_id), array('class'=>'fn_b')); ?>
	</p>
	<p class="fn_b"><?php echo $data->bc_text; ?></p>
	<?php echo CHtml::link('回复', array('/comments/view', 'id'=>$data->bc_id), array('class'=>'fn_b')); ?>
</li>
<?php }?>