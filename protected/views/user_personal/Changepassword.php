<?php
/* @var $this User_personal */

/* @var $form CActiveForm */
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <h3> <?php echo Yii::app()->user->getFlash('success'); ?></h3>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">
        <h3><?php echo Yii::app()->user->getFlash('error'); ?></h3>
    </div>
<?php endif ?>


<?php if($flag): ?>

    <?php echo CHtml::form('','POST'); ?>
    <?php echo CHtml::encode('Введите новый пароль');?>
    <br>
    <br>
    <?php echo CHtml::passwordField('password','',array('id'=>'text'));?>
    <br>
    <br>
    <?php echo CHtml::passwordField('password_two','',array('id'=>'text_1'));?>
    <br>
    <br>
    <?php echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary','id'=>'sub'));?>
    <?php echo CHtml::endForm()?>
<?php endif ?>



<script type="text/javascript">

    $(document).ready(function(){
        $('#sub').click(function(){

            var first_pas=document.getElementById('text').value
            var first_pas2=document.getElementById('text_1').value

           if (first_pas!=first_pas2)
           {
               alert('Пароли не совпадают');
               return false;
           }
            else

            return true;
        })

    })


</script>