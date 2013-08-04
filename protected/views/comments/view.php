<?php
/* @var $this CommentsController */
/* @var $model Comments */
?>

<ul class="box-cell">
	<li class="box-item">
		<p>
			<?php if (Yii::app()->user->id) {
				$postCount = Comments::model()->countByAttributes(array('bc_id'=>$row->bp_id, 'bu_id'=>Yii::app()->user->id));
				$saveCount = Save::model()->countByAttributes(array('bp_id'=>$row->bp_id, 'bu_id'=>Yii::app()->user->id, 'type'=>'2'));
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
				<span onclick="getScore('<?php echo $row->bp_id; ?>',this)"><img src="<?php echo tbu();?>images/grayarrow.png" width="12" title="赞"></span>
			<?php
				}
			}else{
			?>
				<span onclick="getScore('<?php echo $row->bp_id; ?>',this)"><img src="<?php echo tbu();?>images/grayarrow.png" width="12" title="赞"></span>
			<?php } ?>
		<span><?php echo $row->bc_like; ?></span>个赞
		来自 <?php echo CHtml::link($row->user->bu_name, array('/user/view', 'id'=>$row->bu_id)); ?>
		<?php echo tranTime($row->bc_create_time); ?>
		|	<?php echo CHtml::link('返回', array('/posts/view', 'id'=>$row->bp_id)); ?>
		|	<?php echo CHtml::link('举报', array('/')); ?>
		</p>
		<p class="fn_b ml5"><?php echo nl2br($row->bc_text); //保留换行?></p>
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
			<?php echo $form->hiddenField($model,'bp_id',array('value'=>$row->bp_id)); ?>
			<?php echo $form->hiddenField($model,'bc_path',array('value'=>$row->bc_path)); ?>

			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>

</ul>

