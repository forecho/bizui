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


	$vider = Yii::createComponent('application.components.VideoClass');
	$url = 'http://www.56.com/u13/v_NTg3NjQ5OTQ.html';
	print_r( call_user_func_array( array($vider, 'parse' ), array( $url ) ) );


?>
