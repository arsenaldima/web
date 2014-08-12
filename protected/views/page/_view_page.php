<?php
/**
 * Created by JetBrains PhpStorm.
 * User: дима
 * Date: 01.08.14
 * Time: 12:17
 * To change this template use File | Settings | File Templates.
 */


    echo CHtml::link('<h3>'.$data->title.'</h3>',array('view','id'=>$data->id));
    echo CmsSetting::car_image($data->path_img,200,150,'','./images/pages/');
    echo "<br>";
    echo "<br>";
    echo CHtml::link('Читать далее...',array('view','id'=>$data->id));
    echo '</br> <hr>';


?>