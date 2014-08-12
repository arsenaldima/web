<?php
/* @var $this CmsUserController */
/* @var $model CmsUser */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'cms-user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Поля с <span class="required">*</span>  есть обязательные.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'repeat_password'); ?>
        <?php echo $form->passwordField($model,'repeat_password',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'repeat_password'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>



    <?php if(CCaptcha::checkRequirements()): ?>
        <div class="row">
            <?php echo $form->labelEx($model,'verifyCode'); ?>
            <div>
                <?php $this->widget('CCaptcha'); ?>
                <br>
                <?php echo $form->textField($model,'verifyCode'); ?>
            </div>
            <br>
            <div class="hint">
            <?php echo $form->error($model,'verifyCode'); ?>
        </div>
    <?php endif; ?>


    <br>
    <br>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Регистрация',array('class'=>'btn btn-primary btn-lg')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->