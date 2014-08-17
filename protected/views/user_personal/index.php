<?php
/* @var $this User_personalController */
/* @var $model $CmsUser*/
/* @var $model1 $CmsPage*/
$this->breadcrumbs=array(
	'User Personal',
);


?>
<script type="text/javascript">

function funS(){

    if($('#but').val()=="Подписаться")
    $('#but').val("Отписаться");
    else
        $('#but').val("Подписаться");
}

function Fun(){
    $('#form_sms').hide();
    $('#metka').show();
    alert('Сообщение успешно отправлено');

}

$(document).ready(function(){

    $('#but').bind("click",function(){

        $.ajax({
         url:"/web_test/index.php?r=user_personal/axjax_query",
         type:"POST",
         data:({}),
         dataType:"html",
         success: funS
        });
    })

    $('#metka').bind("click",function(){
        $('#metka').hide();
        $('#form_sms').show(1000);


    });

    $('#sub_but').bind("click",function(){
        alert('sdfsdf');
        $.ajax({
            url:"/web_test/index.php?r=user_personal/axjax_mail",
            type:"POST",
            data:({text: $('#sms_id').val(), id:$('.dima').attr('id')}),
            dataType:"html",
            success: Fun
        });
    })

})
</script>


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
    <br>
    <br>
    <?php
    if($id==Yii::app()->user->id)
    {
        ($model->podpis==0)?$dim="Отписаться":$dim="Подписаться";

    echo CHtml::button($dim,array('id'=>'but','class'=>'btn btn-primary'));}?>
    <br>
    <br>
    <br>
    <a  id='metka' style="cursor: pointer">Отправить личное сообщение пользователю</a>
    <br>
    <br>
    <div id='form_sms' style="display: none">

    <?php
    echo CHtml::form('','POST',array('class'=>'dima1','id'=>$id));
    echo CHtml::textArea('sms','',array('id'=>'sms_id'));
    echo "<br>";
    echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary', 'id'=>'sub_but'));
    echo CHtml::endForm();
    ?>

</div>


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



