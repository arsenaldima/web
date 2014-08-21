<?php
/* @var $comments*/
?>

<style type="text/css">

    .li_n:hover
    {
        cursor:pointer;
        color: green;
    }
    .panel{
        border: solid;
        border-color: #0000ff;
        border-radius: 5px;
        border-width: 1px ;
        bottom: 70%;
    }

    ol>li{
        display:block;
    }
    ol{
        counter-reset:item;
    },
    ol>li:before{

        counter-increment:item;
        content:counters(item,".") ". ";
    }

</style>

<ol  class="comments-list" type="1">
    <?php foreach($comments as $comment):?>
        <li id="<?php echo $comment->id; ?>">

            <?php if($comment->status==1):?>

            <div class="panel">

               <?php if($comment->user_id!=null): ?>
                <?php echo CHtml::link(CmsUser::get_name($comment->user_id),array('user_personal/index','id'=>$comment->user_id)); endif; ?>
               <?php if($comment->user_id==null): ?>
               <?php echo CHtml::encode($comment->guest); endif ?>

                <?php echo Yii::app()->dateFormatter->formatDateTime($comment->created);?>

            </div>

            <div class="panel">
                <?php echo CHtml::encode($comment->content);?>
            </div>

            <?php if($comment->user_id==Yii::app()->user->id) echo CHtml::link('Удалить',array('/page/delete','id'=>$comment->id))?>
            <?php if(count($comment->childs) > 0 ) $this->renderPartial('_view', array('comments' => $comment->childs));  ?>
            <?php if(count($comment->childs) <= 0 ): ?> <a id="<?php echo $comment->id; ?>" class="li_n">Ответить</a>  <?php endif?>

            <?php endif ?>
        </li>
    <?php endforeach;?>
</ol>


