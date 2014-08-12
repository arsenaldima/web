<?
/**
 * @var $this CController
 * @var $user User
 */
?>
<p>Сообщение с сайта  <a target="_blank" href="http://localhost/web_test/index.php?r=site/index">http://localhost/web_test/index.php?r=site/index</a></p><br>
<p>Пользователь <?=CHtml::link($user->username, $this->createAbsoluteUrl('user_personal/change/', array('id' => $user->id)))?> перейдите по ссылке для смены email</p>