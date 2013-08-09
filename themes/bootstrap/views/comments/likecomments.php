<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_comments',
	'emptyText'=>'暂时没有数据',  
   	'template'=>'{items}{pager}',
   	'htmlOptions'=>array('class'=>'box'),
    'itemsTagName'=>'ol',
    'itemsCssClass'=>'box-cell',
)); ?>