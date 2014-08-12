<?php
/* @var $this CmsUserController */
/* @var $model CmsUser */





Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cms-user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms Users</h1>


<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cms-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
        'email',
        'created'=>array(
            'name'=>'created',
            'value'=>'date("j.m.Y.H:i",$data->created)',
            'filter'=>false,
        ),

        'ban'=>array(
            'name'=>'ban',
            'value'=>'($data->ban==1)?"бан":" "',
            'filter'=>array(0=>"да",1=>"нет"),

        ),

        'role'=>array(
            'name'=>'role',
            'value'=>'($data->role==1)?"Юзер":($data->role==2)?"Модератор":"Админ"',
            'filter'=>array(1=>"Юзер",2=>"Модератор",3=>"Модератор"),

        ),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
