<?php
/* @var $this SaveController */
/* @var $data Save */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bu_id')); ?>:</b>
	<?php echo CHtml::encode($data->bu_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bp_id')); ?>:</b>
	<?php echo CHtml::encode($data->bp_id); ?>
	<br />


</div>