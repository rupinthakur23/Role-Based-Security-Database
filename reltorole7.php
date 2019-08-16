
<?php
include_once "conn.php";

$privilege=$_POST['Privelege'];
$role=$_POST['name'];
  
$table=$_POST['table'];



$sql= "SELECT relation_id FROM relation_privileges WHERE privilege=(?);";


  
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "SQL ERROR";
} else{
	mysqli_stmt_bind_param($stmt,"s",$privilege);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
       $row=mysqli_fetch_assoc($result);
	
}





$relation_id=$row['relation_id'];



$sql= "INSERT INTO relation_user_role ( relation_role_name,relation_id,tables_name) VALUES (?,?,?);";



$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "SQL ERROR";
} else{
	mysqli_stmt_bind_param($stmt,"sis",$role,$relation_id,$table);
	mysqli_stmt_execute($stmt);
}



header("Location: index.html?signup=success");