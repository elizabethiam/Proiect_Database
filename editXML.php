<?php
if(isset($_POST['submit'])) {
$id=$_POST['id'];
 $data=simplexml_load_file('data.xml');
foreach($data->date as $date){
    if($date->id==$id){
unlink($date->image);
 $date->descr=$_POST['descr'];
$target="./images/".md5(uniqid(time())).basename($_FILES['image']['name']);
 $date->image=$target;
    }
}
$handle=fopen("data.xml","wb");
fwrite($handle,$data->asXML());
fclose($handle);

if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
       header('location:prodwatches.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
}
  ?>

<?php
$id=$_GET['id'];
$data=simplexml_load_file('data.xml');
foreach($data->date as $date){
    if($date->id==$id){
?>
<form method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "id" value="<?php echo $date->id; ?>"> <br><br>
Descr: <br>
<input type = "text" name = "descr" value="<?php echo $date->descr; ?>"> <br><br>
Image: <br>
 <input type="file" name="image"><br><br>
 <img src="<?php echo $date->image; ?>"><br><br>
 Price: <br>
<input type = "text" name = "price" value="<?php echo $date->price; ?>"> <br><br>
<input type="submit" name="submit" value="Update">
</form>
<?php
    }
}
?>


