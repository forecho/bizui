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
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'New', 'url'=>array('/site/new')),
					array('label'=>'Submit', 'url'=>array('/posts/create')),
					array('label'=>'Comments', 'url'=>array('/comments/index')),
					// array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
					// array('label'=>'Contact', 'url'=>array('/site/contact')),
				),
				'htmlOptions'=>array('class'=>'nav navbar-nav'),
			)); 
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Signup', 'url'=>array('/site/signup'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>Yii::app()->user->name, 'url'=>array('/user/view', 'id'=>Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
				'htmlOptions'=>array('class'=>'nav navbar-nav pull-right'),
			)); 
		?>
	</div>

</div>
<div class="container bs-docs-container">
	<div class="col-lg-9"><?php echo $content; ?></div>
	<div class="col-lg-3">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
	</div>
</div>

</body>
</html>
