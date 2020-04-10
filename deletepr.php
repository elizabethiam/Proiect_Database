<?php

require_once "connection1.php";
$sqlProcedura1="DROP PROCEDURE IF EXISTS deleteProdus";
$sqlProcedura2="CREATE PROCEDURE products.deleteProdus(
    IN strID int(11)
    )
    BEGIN 
        DELETE FROM products WHERE id=strID;
    END;";

$stmt1=$con1->prepare($sqlProcedura1);
$stmt2=$con1->prepare($sqlProcedura2);
$stmt1->execute();
$stmt2->execute();

$sqlTrigger="CREATE TRIGGER AfterDeleteProdus AFTER DELETE ON products FOR EACH ROW 
    BEGIN
    INSERT INTO
    products_update(title,status,edtime)VALUES(OLD.title,'DELETED',NOW());
    END;";

$stmt=$con1->prepare($sqlTrigger);
$stmt->execute();

$id=$_GET['id'];
$sqlProcedura3="CALL deleteProdus('{$id}')";
$qProcedura=$con1->query($sqlProcedura3);

header('location:watchprod.php');