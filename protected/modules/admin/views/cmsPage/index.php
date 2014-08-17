<?php
/* @var $this CmsPageController */
/* @var $model CmsPage */


$this->menu=array(

	array('label'=>'Создание Страницы', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cms-page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал страниц</h1>


<?php echo CHtml::link('Расширеный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cms-page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
            'name'=>'id',
            'headerHtmlOptions'=>array('width'=>30),

        ),
		'title',
	    'created'=>array(
            'name'=>'created',
            'value'=>'date("j.m.Y.H:i",$data->created)',
            'filter'=>false,
        ),
		'status'=>array(
            'name'=>'status',
            'value'=>'($data->status==0)? "Черновик":($data->status==1)? "На модерацию":($data->status==2) ? "Опубликовать":"Снять с пуб"',
            'filter'=>array(0=>"Черновик",1=>"На модерацию",2=>"Опубликовать",3=>"Снять с пуб"),

        ),
		'category_id'=> array(
            'name'=>'category_id',
            'value'=>'$data->category->title',
            'filter'=>CmsCategory::all(),
        ),

        'user_id'=> array(
            'name'=>'user_id',
            'value'=>'$data->user->username',
            'filter'=>CmsUser::all(),
        ),
		array(
			'class'=>'CButtonColumn',
            'viewButtonOptions'=> array('style'=>'display:none'),
		),
	),
)); ?>
