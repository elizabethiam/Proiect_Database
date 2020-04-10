<?php

$msg="";
if(isset($_POST['upload'])){
$target="./images/". md5(uniqid(time())). basename($_FILES['image']['name']);
$descr=$_POST['descr'];  
$id=$_POST['id'];
$price=$_POST['price'];
$xml=simplexml_load_file('data.xml');
$date=$xml->addChild('date');
$date->addChild('image',$target);
$date->addChild('id',$id);
$date->addChild('descr',$descr);
$date->addChild('price',$price);
$date->addChild('view','viewXML.php?id='.$id);
$date->addChild('edit','editXML.php?id='.$id);
$date->addChild('delete','deleteXML.php?id='.$id);
$date->addChild('confirm','return confirm("Are you sure you want to delete this item?")');
$date->addChild('back','prodwatches.php');

file_put_contents('data.xml', $xml->asXML());
if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
       header('location:prodwatches.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
}


