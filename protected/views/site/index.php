<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<<<<<<< HEAD
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>
<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
<?php 
$arr['laruence'] = 'huixinchen';
$arr['yahoo']    = 2007;
$arr['baidu']    = 2008;

for($i=0,$l=count($arr); $i<$l; $i++) {
 //这个时候,不能认为是顺序遍历(线性遍历)
	echo $arr[$i];
} 
?>
=======
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_post', 
    'emptyText'=>'暂时没有数据',  
   	'template'=>'{items}{pager}',
    'htmlOptions'=>array('class'=>'box'),
    'itemsTagName'=>'ol',
    'itemsCssClass'=>'box-cell',
));
?>
>>>>>>> 79fa264195feb5885d46e4db6b5009d833fbcd7d
