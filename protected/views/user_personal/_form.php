<?php
/* @var $this CmsPageController */
/* @var $model CmsPage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cms-page-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),

    // Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательный.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
   <br>
    <div class="row">
        <?php if(!CmsPage::model()->isNewRecord) echo CmsSetting::car_image($model->path_img,200,150,'img-thumbnail bord','./images/pages/');?>
        <?php echo $form->fileField($model,'image'); ?>
        <?php echo $form->error($model,'image'); ?>
    </div>
    <br>
    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php $this->widget('application.extensions.ckeditor.CKEditor', array( 'model' => $model, 'attribute'=>'content', 'language'=>'ru', 'editorTemplate'=>'full', )); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>
    <br>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>

        <?php echo $form->dropDownList($model,'status',array(0=>"Черновик",1=>"На модерацию")); ?>

        <?php echo $form->error($model,'status'); ?>
	</div>
    <br>
	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',CmsCategory::all()); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>
    <br>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->