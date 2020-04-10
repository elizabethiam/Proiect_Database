<?php
$username=$_POST['form-username'];
$password=$_POST['form-password'];
$xml = simplexml_load_file('data_login.xml');
$date=$xml->addChild('date');
$date->addChild('username', $username);
$date->addChild('password', $password);
file_put_contents('data_login.xml', $xml->asXML());
header("location:login.php");
?>