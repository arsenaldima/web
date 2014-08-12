<?php
/* @var $this CmsCommentController */
/* @var $model CmsUser */
/* @var $form CActiveForm */
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>
<br>
<?php echo CHtml::form('','POST');

?>
<?php echo CHtml::encode('Введите email друга');?>
<br>
<br>
<?php echo CHtml::textField('email','',array('id'=>'text'));?>
<br>
<br>
<?php echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary','id'=>'sub'));?>
<?php echo CHtml::endForm()?>

<script type="text/javascript">

    $(document).ready(function(){
        $('#sub').click(function(){
            var reg_mail = /^[\.a-z0-9_-]{3,20}@[\.a-z0-9_-]{1,20}\.[a-z]{2,4}$/i;

            if (!reg_mail.test($('#text').val()))
            {
                alert('Проверьте правильность данных!');
                return false;
            }
            else
                return true;

        })

    })

</script>