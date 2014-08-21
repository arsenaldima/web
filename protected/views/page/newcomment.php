

<?php
/* @var $this CmsCommentController */
/* @var $model CmsComment */
/* @var $form CActiveForm */

?>



<div class="form">
<?php
$flag=CmsSetting::model()->findByPk(1);
if(!Yii::app()->user->isGuest||(Yii::app()->user->isGuest && $flag->gost_com)): ?>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'cms-comment-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

<div>
   <h3 id='new_kom'>Новый комментарий</h3>
   <h3 id='otvet_kom' style='display: none'>Ответ на комментарий</h3>
</div>

    <?php echo $form->errorSummary($model); ?>

        <br>
        <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>200)); ?>
        <?php echo $form->error($model,'content'); ?>




<?php echo $form->hiddenField($model,'parent_id',array('id'=>'parent')); ?>
    <?php echo $form->error($model,'parent_id'); ?>

    <?php if(Yii::app()->user->isGuest):?>

    <div class="row">
        <br>

        <?php echo CHtml::encode("Введите свой email");?>
        <br>
        <?php echo $form->textField($model,'guest',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'guest'); ?>


    <?php  endif ?>




    <div class="row buttons">
        <?php echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary')); ?>
    </div>

        </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif ?>