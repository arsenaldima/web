<?php
/* @var $this User_personalController */
/* @var $model $CmsUser*/
/* @var $model1 $CmsPage*/
$this->breadcrumbs=array(
	'User Personal',
);


?>

<div>
 <br>
 <h2>Персональная страница пользователя  <?php echo CHtml::encode($model->username); ?></h2>
    <br>
    <h6>Последняя дата авторизации <?php echo date("j.m.Y.H:i",$model->data_avtor) ?></h6>
    <hr />
    <?php if($model->prigl_id!=0):?>

    <h4>Пригласил пользователь

        <?php
            $user=CmsUser::model()->findByPk($model->prigl_id);
            echo CHtml::link($user->username,array('index','id'=>$user->id));
            echo "<br>";
         endif ?>

    </h4>
    <br>

</div>

<div>
    <?php echo CmsSetting::car_image($model->picture,200,150,'img-thumbnail bord','./images/avatars/');?>
    <?php echo CHtml::button('asd',array('id'=>'but'))?>
</div>


<br>
<h4>Приглашонные пользователи</h4>
<br>
<?php
$model2=CmsUser::model()->findAllByAttributes(array('prigl_id'=>array($model->id),));
if($model2!=null)
{
    foreach($model2 as $one)
    {
        echo CHtml::link($one->username,array('index','id'=>$one->id));
        echo "<br>";

    }

}

?>

<?php    $this->Widget('ext.graph.highcharts.HighchartsWidget', array(
    'options'=>array(
        'title' => array('text' => 'График активности пользователя'),
        'xAxis' => array(
            'categories' => array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август', 'Сентябрь', 'Октябрь','Ноябрь','Декабырь',)
        ),
        'yAxis' => array(
            'title' => array('text' => 'Количество статей')
        ),
        'series' => array(
            array('name' => $model->username, 'data' => CmsSetting::ar_kol($id)),

        )
    )
));

?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>CmsPage::vivod_page($id),
    'itemView'=>'_view_com',
    'emptyText'=>'В данной категории нет статей',
    'sorterHeader'=>'Сортировать по :',
    'sortableAttributes'=>array('created','status'),

)); ?>



<script type="text/javascript">

    $(document).ready(function(){
        $('#but').click(function(){
             $(this).val('подписан');

            $.post('user_personal/subscribe').done(function(){
                alert('sdfsdf');

            })

        })

    })


</script>