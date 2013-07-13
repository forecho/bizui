<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bu_id), array('view', 'id'=>$data->bu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_email')); ?>:</b>
	<?php echo CHtml::encode($data->bu_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_name')); ?>:</b>
	<?php echo CHtml::encode($data->bu_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_password')); ?>:</b>
	<?php echo CHtml::encode($data->bu_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_reg_ip')); ?>:</b>
	<?php echo CHtml::encode($data->bu_reg_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_last_ip')); ?>:</b>
	<?php echo CHtml::encode($data->bu_last_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_last_time')); ?>:</b>
	<?php echo CHtml::encode($data->bu_last_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_create_time')); ?>:</b>
	<?php echo CHtml::encode($data->bu_create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_status')); ?>:</b>
	<?php echo CHtml::encode($data->bu_status); ?>
	<br />

	*/ ?>

</div>