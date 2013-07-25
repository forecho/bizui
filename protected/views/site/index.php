<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

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
