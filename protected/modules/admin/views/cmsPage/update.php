<?php
/* @var $this CmsPageController */
/* @var $model CmsPage */



$this->menu=array(
	array('label'=>'Журнал', 'url'=>array('index')),
	array('label'=>'Создать страницу', 'url'=>array('create')),


);
?>

<h1>Обновить страницу <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>