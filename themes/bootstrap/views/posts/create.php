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
