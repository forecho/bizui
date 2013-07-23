<?php
/* @var $this OptionsController */
/* @var $data Options */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bo_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bo_name), array('view', 'id'=>$data->bo_name)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bo_value')); ?>:</b>
	<?php echo CHtml::encode($data->bo_value); ?>
	<br />


</div>