<?php
/* @var $comments*/
?>

<style type="text/css">

    .link:hover
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

</style>

<ul class="comments-list">
    <?php foreach($comments as $comment):?>
        <li id="<?php echo $comment->id; ?>">

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


            <?php if(count($comment->childs) > 0 ) $this->renderPartial('_view', array('comments' => $comment->childs));  ?>
            <?php if(count($comment->childs) <= 0 ): ?> <a id="<?php echo $comment->id; ?>" class="link">Ответить</a>  <?php endif?>

        </li>
    <?php endforeach;?>
</ul>


