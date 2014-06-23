<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhu
 * Date: 14-6-23
 * Time: ÏÂÎç10:06
 * To change this template use File | Settings | File Templates.
 */
include 'library/Template.php';
$tmp = new Template();
$tmp->assign(array('name'=>'zhu','age'=>'12'));
$tmp->show('hello');