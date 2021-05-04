<?php
include("../includes/db.php");
print_r($_GET["university"] . " added");
$rows = $db -> prepare("INSERT INTO universities SET title=:university");
$rows = $rows->execute(array("university"=>$_GET["university"]));
if($rows){
    header('Refresh: 1; url=index.php');
}

?>