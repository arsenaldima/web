<?php
/**
 * Created by JetBrains PhpStorm.
 * User: дима
 * Date: 04.08.14
 * Time: 10:13
 * To change this template use File | Settings | File Templates.
 */


?>


<?php $this->widget('application.extensions.dropzone.EDropzone', array(
    'model' => $model->image,
    'attribute' => 'file',
    'url' => $this->createUrl('user_personal/AjexTest'),
    'mimeTypes' => array('image/jpeg', 'image/png'),
    'onSuccess' => 'someJsFunction();',
    'options' => array(),
)); ?>


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cms-user-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),

)); ?>

    <div class="row">
        <?php echo $form->fileFieldRow($model, 'image'); ?> <!-- Вот наше поле загрузки картинки -->
        <br>


      </div>



<br>
<?php echo CmsSetting::car_image($model->picture,200,150,'img-thumbnail bord','./images/avatars/'); ?>

<br>
    <br>
    <br>
<?php echo CHtml::submitButton('Обновить', array('class' => 'save')); ?>
<?php $this->endWidget(); ?>