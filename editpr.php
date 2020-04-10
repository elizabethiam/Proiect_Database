<?php
         require_once 'connection1.php';
      $sqledit1="DROP PROCEDURE IF EXISTS proceduraEdit";
$sqledit2="CREATE PROCEDURE proceduraEdit(
    IN strID int(11),
    IN strTitle varchar(100),
    IN strImage varchar(100),
    IN strDescr text,
    IN strPrice varchar(100),
    IN strKeywords text
    )
    BEGIN
    UPDATE products SET title=strTitle, image=strImage,descr=strDescr,price=strPrice,keywords=strKeywords WHERE id=strID;
    END;";
$stmt1=$con1->prepare($sqledit1);
$stmt2=$con1->prepare($sqledit2);
$stmt1->execute();
$stmt2->execute();

$sqlTrigger="CREATE TRIGGER TrigAfterUpdateProdus AFTER UPDATE ON products FOR EACH ROW
     BEGIN
     INSERT INTO products_update(title,status,edtime) VALUES (NEW.title,'EDITED',NOW());
     END;";
$stmt=$con1->prepare($sqlTrigger);
$stmt->execute();

        if(!isset($_POST["submit"]))
        {$sql="SELECT * FROM products WHERE ID='{$_GET['id']}'";
            $result=mysqli_query($con, $sql);
            $record=  mysqli_fetch_array($result);
        }else{
 $sql2="SELECT * FROM products WHERE ID='{$_POST['id']}'"; 
           $result2=mysqli_query($con, $sql2);
            $rec=  mysqli_fetch_array($result2);
           
            $id=$_POST['id']; 
            $title=$_POST['title'];
            $descr=$_POST['descr'];
            $price=$_POST['price'];
            $keywords=$_POST['keywords'];
           if(isset($_POST['image'])){
           $target="./products/".basename($_FILES['image']['name']);
           }else{
           $target=$rec['image'];
           echo $target;
           } 
        
           
$sqledit="CALL proceduraEdit('{$id}','{$title}','{$target}','{$descr}','{$price}','{$keywords}')";
 $qedit=$con1->query($sqledit);
 move_uploaded_file($_FILES['image']['tmp_name'],$target);
          header('Location:watchprod.php');
        }
        
 ?>
<h1>Editati inregistrarea:</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    Titlu:<br/><input type="text" name="title" value="<?php echo $record['title'] ;?>"/><br/>
    Pret:<br/><input type="text" name="price" value="<?php echo $record['price'] ;?>"/><br/>
    Descriere:<br/><textarea rows="4" cols="50" name="descr" value=""><?php echo $record['descr'] ;?>
    </textarea><br/>
    Keywords:<br/><textarea rows="4" cols="50" name="keywords" value=""><?php echo $record['keywords'] ;?>
    </textarea>
<br/>
    Image: <br/><input type="file" name="image" value="<?php echo $record['image'] ;?>"><br/>
    <img src="<?php echo $record['image'] ;?>"><br/>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
    <input type="submit" name="submit" value="Edit"/>
</form>