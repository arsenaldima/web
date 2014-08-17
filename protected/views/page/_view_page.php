<?php
/**
 * Created by JetBrains PhpStorm.
 * User: дима
 * Date: 01.08.14
 * Time: 12:17
 * To change this template use File | Settings | File Templates.
 */


    echo CHtml::link('<h3>'.$data->title.'</h3>',array('view','id'=>$data->id))  ;

switch($data->user->role)
    {
        case 1: {echo 'Пользователь      '; break;}
        case 2: {echo 'Модератор         '; break;}
        case 3: {echo 'Администратор     '; break;}
    }
    echo CHtml::link($data->user->username,array('user_personal/index','id'=>$data->user->id));
    echo "<br>";
    echo CmsSetting::car_image($data->path_img,200,150,'','./images/pages/');
    echo "<br>";
    echo "<br>";
    echo CHtml::link('Читать далее...',array('view','id'=>$data->id));
    echo '</br> <hr>';


?>