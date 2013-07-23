<?php
/* @var $this CommentsController */
/* @var $data Comments */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bc_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bc_id), array('view', 'id'=>$data->bc_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bp_id')); ?>:</b>
	<?php echo CHtml::encode($data->bp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_id')); ?>:</b>
	<?php echo CHtml::encode($data->bu_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bc_text')); ?>:</b>
	<?php echo CHtml::encode($data->bc_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bc_status')); ?>:</b>
	<?php echo CHtml::encode($data->bc_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bc_parent')); ?>:</b>
	<?php echo CHtml::encode($data->bc_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bc_create_time')); ?>:</b>
	<?php echo CHtml::encode($data->bc_create_time); ?>
	<br />


</div>