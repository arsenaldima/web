
<?php
/* @var $this Page */
/* @var $model CmsPage */
/* @var $form CActiveForm */
/* @var $model1 CmsComment */
?>
<style type="text/css">
    .white_r{
        color: #ffffff;

    }

    .black_r{
        color: #000000;
        font: 14px;
        font-family: Arial;

    }

</style>

<?php $this->breadcrumbs=array('Категории : ' . $model->category->title => array('index','id'=>$model->category_id),$model->title);
?>
<h1>
<?php
echo $model->title;
if(($model->user_id==Yii::app()->user->id)&&($model->status==0))
echo CHtml::link('Редактировать',array('/user_personal/update','id'=>$model->id))

?>
</h1>

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
        $('.link').click(function() {
            $('.parent_id').attr('value',this.id);
            $('#dd').attr('class','white_r');
            $('#dd2').attr('class','black_r');

        });
    });

</script>

