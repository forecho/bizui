<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_likecomments',
	'emptyText'=>'暂时没有数据',  
   	'template'=>'{items}{pager}',
    'pager' => array(
            'header'=>false,
            'htmlOptions'=>array('class'=>'pagination'),
            'selectedPageCssClass' => 'active',        
            'hiddenPageCssClass' => 'disabled',
        ),
    'htmlOptions'=>array('class'=>'panel'),
    'itemsTagName'=>'div',
    'itemsCssClass'=>'box-cell',
    'pagerCssClass'=>'',
)); ?>