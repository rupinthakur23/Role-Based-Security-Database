<?php
include_once "conn.php";

$name=$_POST['name'];
  $description=$_POST['description'];
 


  
/*INSERT INTO `user_account`( `Name`, `Phone`) VALUES ('',);*/
$sql= "INSERT INTO user_role(role_name, description)VALUES (?,?);";


  
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "SQL ERROR";
} else{
	mysqli_stmt_bind_param($stmt,"ss",$name,$description);
	mysqli_stmt_execute($stmt);
	
}

header("Location: index.html?signup=success");