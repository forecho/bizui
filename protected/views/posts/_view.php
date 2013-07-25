<?php
/* @var $this PostsController */
/* @var $data Posts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bp_id), array('view', 'id'=>$data->bp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_id')); ?>:</b>
	<?php echo CHtml::encode($data->bu_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bp_title')); ?>:</b>
	<?php echo CHtml::encode($data->bp_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bp_url')); ?>:</b>
	<?php echo CHtml::encode($data->bp_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bp_video_url')); ?>:</b>
	<?php echo CHtml::encode($data->bp_video_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bp_content')); ?>:</b>
	<?php echo CHtml::encode($data->bp_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bp_score')); ?>:</b>
	<?php echo CHtml::encode($data->bp_score); ?>
	<br />



</div>