<?php
/* @var $this SettingController */


?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'cms-setting-form',

    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
));



?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->labelEx($model,'ct_page'); ?>
<?php echo $form->textField($model,'ct_page'); ?>
<br>

<?php echo $form->labelEx($model,'time'); ?>
<?php echo $form->textField($model,'time')?>
<br>
<?php echo $form->labelEx($model,'podtv_email'); ?>
<?php echo $form->checkBox($model,'podtv_email')?>
<br>
<?php echo $form->labelEx($model,'poblicazia_com'); ?>
<?php echo $form->checkBox($model,'poblicazia_com')?>
<br>
<?php echo $form->labelEx($model,'publicazia_stat'); ?>
<?php echo $form->checkBox($model,'publicazia_stat')?>
<br>
<?php echo $form->labelEx($model,'gost_com'); ?>
<?php echo $form->checkBox($model,'gost_com')?>
<br>
<br>
<div class="row buttons">
    <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>
