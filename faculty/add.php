<?php
include ("../includes/db.php");
if($_GET){
    $id = $_GET["id"];
    $uniid = $_GET["uniid"];
    $title = $_GET["faculty"];
}
$rows  = $db->prepare("INSERT INTO faculties SET uniid=:uniid,title=:title");
$rows = $rows->execute(array("uniid"=>$uniid,"title"=>$title));
if ($rows){
    echo "$title Faculty added";
    header("Refresh:1,URL=/university_project/faculty/faculty.php?uniid=$uniid&faculty=$title&id=$id");
}
else{
    echo "NOT ADDED";
}