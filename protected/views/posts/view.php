<?php
/* @var $this PostsController */
/* @var $model Posts */
?>

<ul class="box-cell">
	<li class="box-item">
		<p>
			<?php if (Yii::app()->user->id) {
				$postCount = Posts::model()->countByAttributes(array('bp_id'=>$model->bp_id, 'bu_id'=>Yii::app()->user->id));
				$saveCount = Save::model()->countByAttributes(array('bp_id'=>$model->bp_id, 'bu_id'=>Yii::app()->user->id));
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
				<span onclick="getScore('<?php echo $model->bp_id; ?>',this)"><img src="<?php echo tbu();?>images/grayarrow.png" width="12" title="赞"></span>
			<?php
				}
			}else{
			?>
				<span onclick="getScore('<?php echo $model->bp_id; ?>',this)"><img src="<?php echo tbu();?>images/grayarrow.png" width="12" title="赞"></span>
			<?php } ?>
			
			<?php echo CHtml::link($model->bp_title, $model->bp_url, array('target'=>'_blank', 'class'=>'post-title'));?>
			<span>(<?php echo GetDomain($model->bp_url); ?>)</span>
		</p>
		<p><span><?php echo $model->bp_like; ?></span>个赞
		来自 <?php echo CHtml::link($model->user->bu_name, array('/user/view', 'id'=>$model->bu_id)); ?>
		<?php echo tranTime($model->bp_create_time); ?>
		|
		<?php echo CHtml::link(Comments::model()->Count('bp_id='.$model->bp_id).'条评论', array('/posts/view', 'id'=>$model->bp_id)); ?></p>
	</li>

	<!-- 评论 -->
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'comments-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'action'=>'/r',
	)); ?>
		<div class="row">
			<?php echo $form->textArea($model,'bp_content',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'bp_content'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	<?php $this->endWidget(); ?>

</ul>

<!-- 加载评论 -->
<ol>
	<?php  $this->renderPartial('_comments', array('comments'=>$comments));?>
</ol>

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