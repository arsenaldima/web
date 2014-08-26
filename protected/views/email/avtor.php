<?
/**
 * @var $this CController
 * @var $user User
 */
?>
<p>Сообщение с сайта  <a target="_blank" href="http://localhost/web_test/index.php?r=site/index">http://localhost/web_test/index.php?r=site/index</a></p><br>
<p>Пользователь <?=CHtml::link($this->createAbsoluteUrl('site/Avto/', array('id' => $id)), $this->createAbsoluteUrl('site/Avto/', array('id' => $id)))?> перейдите по ссылке для авторизации</p>