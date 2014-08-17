
<?php
/* @var $this Page */
/* @var $model CmsPage */
/* @var $form CActiveForm */
/* @var $model1 CmsComment */
?>


<?php $this->breadcrumbs=array('Категории : ' . $model->category->title => array('index','id'=>$model->category_id),$model->title);
?>
<h1>
<?php
echo $model->title;
?>
</h1>

<?php if(($model->user_id==Yii::app()->user->id)&&($model->status==0))
    echo CHtml::link('Редактировать',array('/user_personal/update','id'=>$model->id))?>
<br>
<br>
<?php echo date('j.m.Y H:i',$model->created);  ?>
<hr />


<?php
echo $model->content;
?>

<?php
$this->renderPartial('_view',array('comments'=> $comments));
?>


<?php
$this->renderPartial('newcomment',array('model'=> $model1));
?>

<script type="text/javascript">

    $(document).ready(function(){



        $(".li_n").bind("click",function(event) {
            var id = this.id;
            $('#parent').val(id);
            $('#otvet_kom').show(1000);
            $('#new_kom').hide();

             });
         });


</script>

