<?php
//History cu MongoDB
require_once 'connection.php';
$id = new \MongoDB\BSON\ObjectId($_GET['id']);
$filter = ['_id' => $id];
$query = new MongoDB\Driver\Query($filter);          
$article = $client->executeQuery("images.images", $query);
$doc = current($article->toArray());
?>

<ul>
    <li><?php echo $doc->title;?></li>
    <li><img src="<?php echo $doc->image;?>"></li>
</ul>
<a href="watch.php">Back</a>