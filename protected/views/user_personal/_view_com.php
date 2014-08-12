<?php
/* @var $this CmsCommentController */
/* @var $data CmsComment */
?>

<div class="view">

<br>
<?php
if(($data->status==0)||($data->status==2))
{
         echo CHtml::link('<h3>'.$data->title.'</h3>',array('/page/view','id'=>$data->id));
         echo CmsSetting::car_image($data->path_img,50,50,'','./images/pages/');
         if($data->status==0)
         {
             echo CHtml::encode("     Статус:       Черновик");
         }
        else
        {
            if($data->status==2)
                echo CHtml::encode("     Статус:       Опубликованая");
        }
      echo"<br>";
      echo CHtml::encode(date('j.m.Y H:i',$data->created));
}
?>
</div>