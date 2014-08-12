<?php

class User_personalController extends Controller
{

    public $layout='//layouts/column3';

	public function actionIndex($id)
	{

        $model= CmsUser::model()->findByPk($id);


		$this->render('index',array('model'=>$model,'id'=>$id));
	}

    //изменить аватар
    public function actionAvatar()
    {
        $model=CmsUser::model()->findByPk(Yii::app()->user->id);
        $model->scenario='ava';

        if(isset($_POST['CmsUser']))
        {
            if($model->validate())
            {
                        $model->attributes=$_POST['CmsUser'];
                        $image=CUploadedFile::getInstance($model,'image');
                        $model->image=$image;
                        $rand=uniqid();
                        $model->image->saveAs('c:/WebServers/home/localhost/www/web_test/images/avatars/'.$rand.$model->image->name);
                        $model->picture = $model->image->name;
                        CmsUser::model()->updateByPk(Yii::app()->user->id,array('picture'=>$rand.$model->image->getName()));
            }
                    $this->refresh();
        }
           $this->render('avatar',array('model'=>$model));
    }

    public function actionChange_email($id)
    {
        if($id==0)
        {
            if(CmsUser::sendChange())
                Yii::app()->user->setFlash('success','На ваш email отправлено письмо. Для смены email перейдите по ссылке в письме');
            else
                Yii::app()->user->setFlash('error','Письмо не отправленно');

            $flag=false;

        }
        else
        {
            if($id==Yii::app()->user->id)
            {
               $flag=true;

                if(isset($_POST['email']))
                {
                    if(CmsUser::model()->updateByPk(Yii::app()->user->id,array('email'=>$_POST['email'])))
                    {Yii::app()->user->setFlash('success','Ваш email изменён'); $flag=false;}
                    else
                        Yii::app()->user->setFlash('error','email не изменён');

                    $this->refresh('change_email',array('flag'=>$flag));
                }


            }
        }

        $this->render('change_email',array('flag'=>$flag));
    }

    //Приглошение друга
    public function actionPrigl_druga()
    {


        if(isset($_POST['email']))
        {

            if(CmsUser::sendInvite($_POST['email']))
            {
                Yii::app()->user->setFlash('success','письмо успешно отправлено');

            }
            else
                Yii::app()->user->setFlash('error','письмо не отправлено');


                $this->refresh();
        }

        $this->render('prigl_druga');
    }

    public function actionchange_pas($id,$time)
    {
        $model=CmsSetting::model()->findByPk(1);

        if(($id==0)&&($time==0))
        {
            if(CmsUser::sendPas())
                Yii::app()->user->setFlash('success','На ваш email отправлено письмо. Для смены пароля перейдите по ссылке в письме');
            else
                Yii::app()->user->setFlash('error','Письмо не отправленно');

            $flag=false;

        }
        else
        {
            if($id==Yii::app()->user->id)
            {
                $flag=true;

                if($model->time<time()-$time)
                {


                    if(isset($_POST['password']))
                    {
                        if(CmsUser::model()->updateByPk(Yii::app()->user->id,array('password'=>md5('lkjhgfd'.$_POST['password']))))
                        {
                            $flag=false;
                            Yii::app()->user->setFlash('success','Ваш пароль изменён');
                        }
                        else
                            Yii::app()->user->setFlash('error','пароль не изменён');

                        $this->refresh('Changepassword',array('flag'=>$flag));
                    }

                }
            }

        }

        $this->render('Changepassword',array('flag'=>$flag));
    }

public function actionsubscribe(){
    $a=array(1,2,3,4,5);
    print_r($a);
    return true;
}

    public function actionCreate()
    {
        $model=new CmsPage;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['CmsPage']))
        {

            $model->image=CUploadedFile::getInstance($model,'image');
            $model->attributes=$_POST['CmsPage'];

            if($model->save())
                $this->redirect(array('index','id'=>Yii::app()->user->id));

        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }


    public function actionupdate($id)
    {
        $model=CmsPage::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['CmsPage']))
        {
            if($model->validate())
            {
                $model->attributes=$_POST['CmsPage'];
                $image=CUploadedFile::getInstance($model,'image');
                $model->image=$image;
                $rand=uniqid();
                $model->image->saveAs('c:/WebServers/home/localhost/www/web_test/images/pages/'.$rand.$model->image->name);
                $model->path_img = $model->image->name;
                CmsPage::model()->updateByPk($id,array('path_img'=>$rand.$model->image->getName(),'content'=>$model->content, 'title'=>$model->title));

            }



                $this->redirect(array('index','id'=>Yii::app()->user->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }
}