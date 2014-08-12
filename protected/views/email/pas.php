<?
/**
 * @var $this CController
 * @var $user User
 */
?>
<p>Сообщение с сайта  <a target="_blank" href="http://localhost/web_test/index.php?r=site/index">http://localhost/web_test/index.php?r=site/index</a></p><br>
<p>Пользователь  <?=CHtml::link($user->username, array('http://localhost/web_test/index.php?r=user_personal/change/','id' => $user->id,'time'=>time()))?> Для сменны пароля перейдите по ссылке</p>