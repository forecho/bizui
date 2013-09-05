<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="col-lg-9">
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_post', 
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
    'pagerCssClass'=>'pagination',
));
?>
</div>
<div class="col-lg-3">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h5 class="panel-title">声望总排行榜</h5>
        </div>
        <!-- List group -->
        <ul class="list-group">
            <?php foreach ($user as $key => $value) :?>
                <li class="list-group-item"><?php echo CHtml::link($value->bu_name, array('user/view', 'id'=>$value->bu_id)); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
//赞
<?php  if (Yii::app()->user->id){ ?>
function getScore(id,that){
	$.ajax({
        type:"POST",
        url: "<?php echo Yii::app()->createUrl('/posts/ajaxGetScore/') ?>",
        data:"id="+id,
        success: function(msg){
        	$(that).parent().next().children('span').html(msg);
        	$(that).removeAttr("onclick");
        	$(that).children('img').attr('src','<?php echo tbu();?>images/s.gif');
		}
    });
};
<?php } else{?>
function getScore(id,that){
	location.href = "<?php echo Yii::app()->createUrl('/site/login') ?>";
};
<?php } ?>

//显示、隐藏视频
$(document).ready(function(){
    $(".box-cell object").hide();
    $(".video-thumb").live("click", function(){
        $(this).parent().next().toggle();
    })
});
</script>