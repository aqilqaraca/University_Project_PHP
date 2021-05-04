<?php
include ("../includes/db.php");
if($_GET){
    $id = $_GET["id"];
    $title = $_GET["faculty"];
    $uniid = $_GET["uniid"];
}
$rows = $db->prepare("DELETE FROM faculties WHERE id=:id");
$rows ->execute(array("id"=>$id));
if ($rows){
    echo "$title Faculty deleted";
    header("Refresh:1,URL=/university_project/faculty/faculty.php?uniid=$uniid&faculty=$title&id=$id");
}
else{
    echo "NOT deleted";
}