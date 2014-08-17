<?
/**
 * @var $this CController
 * @var $user User
 */
?>
<p>Сообщение с сайта  <a target="_blank" href="http://localhost/web_test/index.php?r=site/index">http://localhost/web_test/index.php?r=site/index</a></p><br>
<p>Пользователь  <?=CHtml::link($user->username, array('http://localhost/web_test/index.php?r=user_personal/index/','id' => $user->id))?> отправил вам личное сообщение</p>\
<p><?php CHtml::encode($text) ?> </p>