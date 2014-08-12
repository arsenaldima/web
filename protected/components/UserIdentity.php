<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    // Будем хранить id.
    protected $_id;

    // Данный метод вызывается один раз при аутентификации пользователя.
    public function authenticate(){



        // Производим стандартную аутентификацию, описанную в руководстве.
        $user = CmsUser::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        if(($user===null) || (md5('lkjhgfd'.$this->password)!==$user->password)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {


            if($user->ban==1)
                $this->errorCode = self::ERROR_USER_IS_BANNED;



            // В качестве идентификатора будем использовать id, а не username,
            // как это определено по умолчанию. Обязательно нужно переопределить
            // метод getId(см. ниже).
            $this->_id = $user->id;

            // Далее логин нам не понадобится, зато имя может пригодится
            // в самом приложении. Используется как Yii::app()->user->name.
            // realName есть в нашей модели. У вас это может быть name, firstName
            // или что-либо ещё.
            $this->username = $user->username;
            CmsUser::model()->updateByPk($this->_id,array('data_avtor'=>time()));
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }



    public function getId(){
        return $this->_id;
    }
}