<?php
include("../includes/db.php");
$id = $_GET["id"];
$rows = $db->prepare("DELETE FROM universities WHERE id=:id");
$rows =  $rows->execute(array("id"=>$id));
if($rows){
    echo "id ". $id . " deleted";
    header('Refresh: 1; url=index.php');
}
?>

