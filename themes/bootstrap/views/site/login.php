<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);

?>

<?php if(!$flag): ?>
<h1>Авторизация</h1>



<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Поля с <span class="required">*</span>  есть обязательными.</p>

    <br>

	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password'); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Авторизироватся',
        )); ?>
	</div>

<?php $this->endWidget(); ?>

    <h5>Вы имеете акаунт в соц. сетях? Кликните на иконку для авторизации:</h5>

    <?php Yii::app()->eauth->renderWidget(); ?>
</div><!-- form -->
<?php endif ?>

<?php if($flag):
    if($flag)
    echo "<h3>На ваш email отправлено сообщение с ссылкой для подтверждения пользователя</h3>";
    else
    echo "<h3>На ваш email не отправлено сообщение с ссылкой для подтверждения пользователя</h3>";

 endif
?>
