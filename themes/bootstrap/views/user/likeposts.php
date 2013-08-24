<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_likeposts', 
    'emptyText'=>'暂时没有数据',  
   	'template'=>'{items}{pager}',
    'pager' => array(
            'header'=>false,
            'htmlOptions'=>array('class'=>'pagination'),
            'selectedPageCssClass' => 'active',        
            'hiddenPageCssClass' => 'disabled',
        ),
    'htmlOptions'=>array('class'=>'list-group'),
    'itemsTagName'=>'ol',
    'itemsCssClass'=>'box-cell',
    'pagerCssClass'=>'',
));
?>