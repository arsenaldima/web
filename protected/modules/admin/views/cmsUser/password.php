<?php
/* @var $this CmsUserController */
/* @var $model CmsUser */



$this->menu=array(
    array('label'=>'Журнал пользователя', 'url'=>array('index')),
    array('label'=>'Создать пользователя', 'url'=>array('create')),
    array('label'=>'Изменить пользователя','url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),

);
?>

Укажите пароль <br>
<?php

echo CHtml::form();
echo CHtml::passwordField('password');
echo "<br>";
echo CHtml::submitButton('Изменить',array('class'=>'btn btn-primary'));
echo CHtml::endForm();

?>