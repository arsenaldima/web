<?php
/* @var $this CmsUserController */
/* @var $model CmsUser */



$this->menu=array(
	array('label'=>'Журнал пользователя', 'url'=>array('index')),
	array('label'=>'Изменить пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Просмотр пользователя  <?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'created'=>array(
            'name'=>'created',
            'value'=>date("j.m.Y.H:i",$data->created),
        ),
		'ban'=>array(
            'name'=>'ban',
            'value'=>($data->ban==1)?"бан":"no_ban",
        ),
		'role'=>array(
            'name'=>'role',
            'value'=>($data->ban==1)?"User":($data->ban==1)? "Moderator ": "Admin",
        ),
		'email',
	),
)); ?>
