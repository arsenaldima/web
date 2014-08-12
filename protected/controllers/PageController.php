<?php

class PageController extends Controller
{


	public function actionIndex($id)

	{

        $category= CmsCategory::model()->findByPk($id);

		$this->render('index',array('category'=>$category));
	}

    public function actionView($id)
    {
        $model= CmsPage::model()->findByPk($id);
        $model1 = new CmsComment();
        $ar=$model1->getCommentsTree($id);

        if(isset($_POST['CmsComment']))
        {
            $model1->page_id=$id;
            $model1->parent_id=20;//nado menat

            if(!Yii::app()->user->isGuest)
                $model1->user_id=Yii::app()->user->id;// esli polzovatel ne gost tokda soxranaem ego id

            $model1->attributes=$_POST['CmsComment'];

            if($model1->save())// soxranaem komentariy
            {
                if(($model1->parent_id!=null)&&(!Yii::app()->user->isGuest))
                {
                    CmsComment::sendOtvet($model1->parent_id);
                }
            $this->refresh();
            }
        }

        if(Yii::app()->user->isGuest)
            $model1->scenario='ComSet';

        $this->render('view',array('model1'=> $model1,'model'=> $model,'comments'=>$ar));
    }



}