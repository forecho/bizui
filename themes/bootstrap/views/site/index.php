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
    'ajaxUpdate'=> false,//这样就不会AJAX翻页
   	'template'=>'{items}{pager}',
    'pager' => array(
            'header'=>false,
            'htmlOptions'=>array('class'=>'pagination'),
            'selectedPageCssClass' => 'active',        
            'hiddenPageCssClass' => 'disabled',
        ),
    'htmlOptions'=>array('class'=>'list-group'),
    'itemsTagName'=>'div',
    'itemsCssClass'=>'row',
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

    <script type="text/javascript">
         document.write('<a style="display:none!important" id="tanx-a-mm_23898038_3412681_14486275"></a>');
         tanx_s = document.createElement("script");
         tanx_s.type = "text/javascript";
         tanx_s.charset = "gbk";
         tanx_s.id = "tanx-s-mm_23898038_3412681_14486275";
         tanx_s.async = true;
         tanx_s.src = "http://p.tanx.com/ex?i=mm_23898038_3412681_14486275";
         tanx_h = document.getElementsByTagName("head")[0];
         if(tanx_h)tanx_h.insertBefore(tanx_s,tanx_h.firstChild);
    </script>

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
        	$(that).parent().prev().children('p').eq(1).children('span').html(msg);
        	$(that).removeAttr("onclick");
            $(that).html('<i class="glyphicon glyphicon-star"></i>已赞');
            $(that).removeClass("btn-primary");
            $(that).addClass("btn-danger");
		}
    });
};
<?php } else{?>
function getScore(id,that){
	location.href = "<?php echo Yii::app()->createUrl('/site/login') ?>";
};
<?php } ?>
</script>