<?php
/* @var $this CmsUserController */
/* @var $model CmsUser */



$this->menu=array(
	array('label'=>'Журнал пользователя', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
    array('label'=>'Изменить пароль','url'=>array('password', 'id'=>$model->id)),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),

);
?>

<h1>Обновить пользователя<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>