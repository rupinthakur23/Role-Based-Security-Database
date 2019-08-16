
<?php
include_once "conn.php";

$privilege=$_POST['privilege'];
$role=$_POST['name'];
  




$sql= "SELECT account_id FROM account_privileges WHERE privilege=(?);";


  
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "SQL ERROR";
} else{
	mysqli_stmt_bind_param($stmt,"s",$privilege);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
       $row=mysqli_fetch_assoc($result);
	
}





$account_id=$row['account_id'];



$sql= "INSERT INTO account_user_role ( account_role_name,account_id) VALUES (?,?);";



$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "SQL ERROR";
} else{
	mysqli_stmt_bind_param($stmt,"si",$role,$account_id);
	mysqli_stmt_execute($stmt);
}

header("Location: index.html?signup=success");

