<?php
include("../includes/db.php");
if($_GET){
    $id = $_GET["id"];
    $title = $_GET["university"];
}
$rows = $db ->prepare("UPDATE universities SET title=:title WHERE id =:id");
$rows = $rows ->execute(array("id"=>$id,"title"=>$title));
if($rows){
    echo "id ". $id . " edited";
    header("Refresh: 1,URL=index.php");
}

?>