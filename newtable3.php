<?php
include_once "conn.php";

$name=$_POST['name'];
  $id=$_POST['ID'];
 


  
/*INSERT INTO `user_account`( `Name`, `Phone`) VALUES ('',);*/
$sql= "INSERT INTO table1(table1_name, owner_id)VALUES (?,?);";


  
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "SQL ERROR";
} else{
	mysqli_stmt_bind_param($stmt,"ss",$name,$id);
	mysqli_stmt_execute($stmt);
	
}

header("Location: index.html?signup=success");