<?php

/**
 * This is the model class for table "cms_setting".
 *
 * The followings are the available columns in table 'cms_setting':
 * @property integer $id
 * @property integer $ct_page
 * @property integer $time
 * @property integer $podtv_email
 * @property integer $poblicazia_com
 * @property integer $publicazia_stat
 * @property integer $gost_com
 *
 */
class CmsSetting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ct_page,  time', 'required'),
			array('ct_page,  podtv_email, poblicazia_com, publicazia_stat, gost_com', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ct_page,  time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ct_page' => 'Количество статей на страницу',
		   'time'=>'Время жизни ссылки',
            'podtv_email'=>'Подтверждение email при авторизации ',
            'poblicazia_com'=>'Публикация комментариев после модерации ',
            'publicazia_stat'=>'Публикация статьи после модерации',
            'gost_com'=>'Может гость оставлять комментарии',



		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ct_page',$this->ct_page);
		$criteria->compare('ct_com',$this->ct_com);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsSetting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function ar_kol($id_user)
    {
        $model=CmsPage::model()->findAllByAttributes(array('user_id'=>array($id_user)));

        $ar=array();

        $rr=date_parse(date("j.m.Y.H:i",time()));

        for($i=0;$i<$rr['month'];$i++)
            $ar[$i]=0;

        foreach($model as $one)
        {
            $rr=date_parse(date("j.m.Y.H:i",$one->created));
            $ar[$rr['month']-1]++;
        }

        return $ar;

    }

    public static  function car_image($name, $width='200', $heigth='200', $class='image',$path)
    {
        if((file_exists($path.$name)&&($name!=null)))
            return CHtml::image($path.$name,$name,
                array(
                    'width'=>$width,
                    'height'=>$heigth,
                    'class'=>$class,
                ));
        else
            return CHtml::image('./images/default/1.jpg','No photo',
                array(
                    'width'=>$width,
                    'height'=>$heigth,
                    'class'=>$class
                ));
    }
}
