<?php
/* @var $this PostsController */
/* @var $model Posts */
$this->pageTitle=$this->pageTitle. ' - ' . Yii::app()->name ;
?>

<div class="form-group">
	<div class="col-lg-offset-2 col-lg-10">
		<h3><?php echo t('create_posts','main'); ?></h3>
	</div>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php 

	// $vider = Yii::createComponent('application.extensions.yii-vider.CPhpVider');
	// $vider->url = 'http://v.youku.com/v_show/id_XMjc0NDYzMDI4.html';
	// $vider->type = 'parse';
	//print_r($vider->_manager);

	echo "<pre>";
	$vider = Yii::createComponent('application.components.VideoClass');
	$url = 'http://video.sina.com.cn/v/b/102228242-1361952270.html';
	print_r( $vider_arr = call_user_func_array( array($vider, 'parse' ), array( $url ) ) );


?>
http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=102228242_1361952270_bUjmTndpDW7K+l1lHz2stqlF+6xCpv2xhGu3vVOtIAxbUgyYJMXNb9wH4ivUCM1G83oLHcwydP4k1R8laq5a/s.swf
<div class="video-thumb">
	<img src="<?php echo $vider_arr['img']['large']?>">
	<i class="video-play-icon"></i>
</div>