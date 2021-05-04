<?php
include ("../includes/db.php");
if($_GET){
    $id = $_GET["id"];
    $title = $_GET["faculty"];
    $uniid = $_GET["uniid"];
}
$rows = $db->prepare("UPDATE faculties SET title=:title WHERE id=:id");
$rows ->execute(array("id"=>$id,"title"=>$title));
if ($rows){
    echo "$title Faculty edited";
    header("Refresh:1,URL=http://localhost/university_project/faculty/faculty.php?uniid=$uniid&faculty=$title&id=$id");
}
else{
    echo "NOT EDITED";
}