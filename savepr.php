<?php 
require_once 'connection1.php';
$msg="";
$sqlprep1="DROP PROCEDURE IF EXISTS procedura1";
$sqlprep2="CREATE PROCEDURE procedura1(
    IN strTitle varchar(100),
    IN strImage varchar(100),
    IN strDescr text,
    IN strPrice varchar(100),
    IN strKeywords text
    )
    BEGIN
    INSERT INTO products
    (title,image,descr,price,keywords)
    VALUES (strTitle,strImage,strDescr,strPrice, strKeywords);
    END;";
$stmt1=$con1->prepare($sqlprep1);
$stmt2=$con1->prepare($sqlprep2);
$stmt1->execute();
$stmt2->execute();

$sqlTrigger="CREATE TRIGGER TrigAfterInsertProdus AFTER INSERT ON products FOR EACH ROW
     BEGIN
     INSERT INTO products_update(title,status,edtime) VALUES (NEW.title, 'UPDATED',NOW());
     END;";
$stmt=$con1->prepare($sqlTrigger);
$stmt->execute();

if(isset($_POST['upload']))
{
   // $target="./products/".md5(uniqid(time())).basename($_FILES['image']['name']);
    $target="./products/".$_FILES['image']['name'];
    $text=$_POST['text'];
    $descr=$_POST['descr'];
    $price=$_POST['price'];
    $keywords=$_POST['keywords'];
    $sqlprep3="CALL procedura1('{$text}','{$target}','{$descr}','{$price}','{$keywords}')";
    $qprep=$con1->query($sqlprep3);
   
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        header('location:watchprod.php');
    }
    else
    {
        $msg="Vai! Vai! Vai!";
    }
}