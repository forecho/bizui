<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
	<div class="container">
		<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
	    </button>
	    <a href="../" class="navbar-brand"><?php echo CHtml::encode(Yii::app()->name); ?></a>
		<?php 
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>t('Home', 'main'), 'url'=>array('/site/index')),
					array('label'=>t('New', 'main'), 'url'=>array('/site/new')),
					array('label'=>t('Submit', 'main'), 'url'=>array('/posts/create')),
					array('label'=>t('Comments', 'main'), 'url'=>array('/comments/index')),
					array('label'=>t('About', 'main'), 'url'=>array('/site/about', 'view'=>'about')),
					// array('label'=>'Contact', 'url'=>array('/site/contact')),
				),
				'htmlOptions'=>array('class'=>'nav navbar-nav'),
			)); 
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>t('Login', 'main'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>t('Signup', 'main'), 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>Yii::app()->user->name, 'url'=>array('/user/view', 'id'=>Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>t('Logout', 'main'), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'class'=>'glyphicon glyphicon-off')
				),
				'htmlOptions'=>array('class'=>'nav navbar-nav pull-right'),
			)); 
		?>
	</div>

</div>
<div class="container bs-docs-container">
	<?php echo $content; ?>
</div>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/respond.src.js"></script>
</body>
</html>
