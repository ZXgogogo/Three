<?php
include_once("1.model.php");

$del=$_GET["del"];
//echo $del;
$arr[]=$del;
$query="update car set delectId=1 where carId='$del'";
$result=mysql_query($query);

$query="select * from car where delectId = 0";
$result=mysql_query($query);
while ($row=mysql_fetch_assoc($result)){
//	var_dump($row);
	$arr[]=$row;
}
	$json = json_encode($arr);
		echo $json;

?>