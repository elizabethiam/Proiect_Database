
<?php
//History cu MongoDB
require_once 'connection.php';
$bulk = new MongoDB\Driver\BulkWrite;
if(isset($_POST["upload"])){
 $target="./images/". md5(uniqid(time())). basename($_FILES['image']['name']);
    $data=array(
        '_id' => new MongoDB\BSON\ObjectID,
        'title'=>$_POST['title'],
        'image'=>$target,
        'descr'=>$_POST['descr'],
    );
    $bulk->insert($data);

}
$client->executeBulkWrite('images.images',$bulk);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
       header('location:watch.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
?>