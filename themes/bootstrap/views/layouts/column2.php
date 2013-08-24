<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="col-lg-9"><?php echo $content; ?></div>
<div class="col-lg-3">
	<?php
		// $this->beginWidget('zii.widgets.CPortlet', array(
		// 	'title'=>'Operations',
		// 	'htmlOptions'=>array('class'=>'panel panel-default'),
		// 	'titleCssClass'=>'panel-title',
		// 	'decorationCssClass'=>'panel-heading',
		// ));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'list-group'),
			'itemCssClass'=>'list-group-item',
		));
		// $this->endWidget();
	?>
</div>
<?php $this->endContent(); ?>