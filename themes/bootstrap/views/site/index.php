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
</script>