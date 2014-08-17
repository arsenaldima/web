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
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->labelEx($model,'ct_page'); ?>
<?php echo $form->textField($model,'ct_page'); ?>
<br>
<?php echo $form->labelEx($model,'ct_com'); ?>
<?php echo $form->textField($model,'ct_com')?>
<br>
<?php echo $form->labelEx($model,'time'); ?>
<?php echo $form->textField($model,'time')?>
<br>
<div class="row buttons">
    <?php echo CHtml::submitButton('Сохранить'); ?>
</div>

<?php $this->endWidget(); ?>
