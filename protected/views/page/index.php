<?php
/* @var $this Page */
/* @var $model CmsPage */
/* @var $form CActiveForm */
/* @var $category CmsCategory */
?>

<?php $this->breadcrumbs=array('Категории : ' . $category->title,);
		 ?>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>CmsPage::vivod($category->id),
    'itemView'=>'_view_page',
    'emptyText'=>'В данной категории нет статей',
    'sorterHeader'=>'Сортировать по :',
    'sortableAttributes'=>array('created'),

)); ?>
