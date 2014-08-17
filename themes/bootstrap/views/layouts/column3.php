<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">

    <div class="span2">




        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Изменение профиля',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>array(

                    array('label'=>'изменение аватар','url'=>array('/user_personal/avatar')),
                    array('label'=>'изменение почту','url'=>array('/user_personal/Change_email','id'=>0)),
                    array('label'=>'изменение пароль','url'=>array('/user_personal/change_pas','id'=>0,'time'=>0)),
                    array('label'=>'пригласить пользователя','url'=>array('/user_personal/prigl_druga')),
                    array('label'=>'Создать статью','url'=>array('/user_personal/create')),
                    array('label'=>'Выйти','url'=>array('/site/logout')),
                ),
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->


    </div>


    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>

</div>
<?php $this->endContent(); ?>