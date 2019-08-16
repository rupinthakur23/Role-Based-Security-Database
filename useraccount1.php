<?php
include_once "conn.php";

$name=$_POST['name'];
  $phone=$_POST['phone'];
 


  
/*INSERT INTO `user_account`( `Name`, `Phone`) VALUES ('',);*/
$sql= "INSERT INTO user_account(name,phone)VALUES (?,?);";


  
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "SQL ERROR";
} else{
	mysqli_stmt_bind_param($stmt,"ss",$name,$phone);
	mysqli_stmt_execute($stmt);
	
}

header("Location: index.html?signup=success");