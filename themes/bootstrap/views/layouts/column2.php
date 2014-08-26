<?php /* @var $this Controller */ ?>
<?php session_start(); $this->beginContent('//layouts/main'); ?>
<div class="row">

    <div class="span2">
        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>CmsCategory::menu('top'),
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