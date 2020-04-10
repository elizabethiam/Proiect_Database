<?php
$con=mysqli_connect('localhost','root','','products')or die("Failed to connect: ".mysqli_error($con));
$dbms='mysql';
    $host='localhost';
    $db='products';
    $user='root';
    $pass='';
    $dsn="$dbms:host=$host; dbname=$db";
    $con1=new PDO($dsn, $user, $pass); ?>
