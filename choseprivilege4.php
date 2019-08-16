
<?php
include_once "conn.php";

$privilegetype=$_POST['type'];
$privilege=$_POST['role'];
  



if($privilegetype == "Relation" )
{


$sql= "INSERT INTO relation_privileges ( privilege) VALUES (?);";

}

else
{

$sql= "INSERT INTO account_privileges ( privilege) VALUES (?);";	
}



  
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "SQL ERROR";
} else{
	mysqli_stmt_bind_param($stmt,"s",$privilege);
	mysqli_stmt_execute($stmt);
	
}

 header("Location: index.html?signup=success");