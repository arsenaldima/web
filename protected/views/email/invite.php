<?
/**
 * @var $this CController
 * @var $user User
 */
?>
<p>Сообщение с сайта  <a target="_blank" href="http://localhost/web_test/index.php?r=site/index">http://localhost/web_test/index.php?r=site/index</a></p><br>
<p>Пользователь  <?php echo CHtml::link($user->username, $this->createAbsoluteUrl('site/registration/', array('id' => $user->id)))?> приглашает Вас на сайт</p>