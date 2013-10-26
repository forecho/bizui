<?php 
	foreach ($comments as $key => $data) {
	$count = count(explode('-',$data->bc_path));
?>
<div class="list-group-item <?php echo ($count!=1)?'pl'.('30'*$count):''; ?>">
	<p>
		<?php if (Yii::app()->user->id) {
			$saveCount = Save::model()->countByAttributes(array('bp_id'=>$data->bc_id, 'bu_id'=>Yii::app()->user->id, 'type'=>'2'));
			//判断是否是自己发布的
			if ($data->bu_id==Yii::app()->user->id) {
		?>
			<span style="width:13px; color:red;">*</span>
		<?php
			//判断评论是否是已经赞过的
			}elseif ($saveCount==1) {
		?>
			<span><img src="<?php echo tbu();?>images/s.gif" width="13"></span>
		<?php
			}else{
		?>
			<span><span onclick="getScore('<?php echo $data->bc_id; ?>',this,'2')"><img src="<?php echo tbu();?>images/grayarrow.png" width="13" title="赞"></span></span>
		<?php
			}
		}else{
		?>
			<span><span onclick="getScore('<?php echo $data->bc_id; ?>',this,'2')"><img src="<?php echo tbu();?>images/grayarrow.png" width="13" title="赞"></span></span>
		<?php } ?>
		<span><span><?php echo $data->bc_like; ?></span></span>个赞
		来自 <?php echo CHtml::link($data->user->bu_name, array('/user/view', 'id'=>$data->bu_id)); ?>
		<?php echo tranTime($data->bc_create_time); ?>
		|
		<?php echo CHtml::link('查看', array('/comments/view', 'id'=>$data->bc_id), array('class'=>'fn_b')); ?>
	</p>
	<p><?php echo nl2br($data->bc_text); //保留换行?></p>
	<?php echo ($data->bu_id==Yii::app()->user->id)?' ':CHtml::link('回复', array('/comments/view', 'id'=>$data->bc_id), array('class'=>'fn_b')); ?>
</div>
<?php }?>