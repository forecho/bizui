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
			'items'=>array(
				array('label'=>t('update_user', 'model'), 'url'=>array('update')),
				array('label'=>t('change_password', 'model'), 'url'=>array('changepwd')),
				array('label'=>t('my_posts', 'model'), 'url'=>array('myposts')),
				array('label'=>t('my_comments', 'model'), 'url'=>array('mycomments')),
				array('label'=>t('my_like_posts', 'model'), 'url'=>array('likeposts')),
				array('label'=>t('my_like_comments', 'model'), 'url'=>array('likecomments')),
			),
			'htmlOptions'=>array('class'=>'list-group'),
			'itemCssClass'=>'list-group-item',
		));
		// $this->endWidget();
	?>
</div>
<?php $this->endContent(); ?>
<script type="text/javascript">
//报名参加活动
$('ul.list-group li a').each(function(){
    if($($(this))[0].href==String(window.location))
        $(this).parent().addClass('active');
});
</script>