<?php
/* @var $this PostsController */
/* @var $row Posts */
?>

<ul class="box-cell">
	<li class="box-item">
		<p>
			<?php if (Yii::app()->user->id) {
				$saveCount = Save::model()->countByAttributes(array('bp_id'=>$row->bp_id, 'bu_id'=>Yii::app()->user->id, 'type'=>'1'));
				//判断是否是自己发布的
				if ($row->bu_id==Yii::app()->user->id) {
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
				<span onclick="getScore('<?php echo $row->bp_id; ?>',this)"><img src="<?php echo tbu();?>images/grayarrow.png" width="12" title="赞"></span>
			<?php
				}
			}else{
			?>
				<span onclick="getScore('<?php echo $row->bp_id; ?>',this)"><img src="<?php echo tbu();?>images/grayarrow.png" width="12" title="赞"></span>
			<?php } ?>
			
			<?php echo CHtml::link($row->bp_title, $row->bp_url, array('target'=>'_blank', 'class'=>'post-title'));?>
			<span>(<?php echo GetDomain($row->bp_url); ?>)</span>
		</p>
		<p><span><?php echo $row->bp_like; ?></span>个赞
		来自 <?php echo CHtml::link($row->user->bu_name, array('/user/view', 'id'=>$row->bu_id)); ?>
		<?php echo tranTime($row->bp_create_time); ?>
		|
		<?php echo CHtml::link(Comments::model()->Count('bp_id='.$row->bp_id).'条评论', array('/posts/view', 'id'=>$row->bp_id)); ?></p>
	</li>

	<!-- 评论 -->
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'comments-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
			<div class="row">
				<?php echo $form->textArea($model,'bc_text',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'bc_text'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>

</ul>


<!-- 加载评论 -->
<ul>
	<?php  $this->renderPartial('_comments', array('comments'=>$comments));?>
</ul>


<script type="text/javascript">
//赞
<?php  if (Yii::app()->user->id){ ?>
function getScore(id,that){
	$.ajax({
        type:"POST",
        url: "<?php echo Yii::app()->createUrl('/posts/ajaxGetScore/') ?>",
        data:"id="+id,
        success: function(msg){
        	$(that).parent().next().children('span').html(msg);
        	$(that).removeAttr("onclick");
        	$(that).children('img').attr('src','<?php echo tbu();?>images/s.gif');
		}
    });
};
<?php } else{?>
function getScore(id,that){
	location.href = "<?php echo Yii::app()->createUrl('/site/login') ?>";
};
<?php } ?>
</script>