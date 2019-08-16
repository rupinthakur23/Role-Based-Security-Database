
<?php
include_once "conn.php";

$user_account=$_POST['name'];
$role=$_POST['phone'];
  

$sql= "UPDATE user_account SET Role_name_useraccount = (?) WHERE id = (?);";


  
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
  echo "SQL ERROR";
} else{
  mysqli_stmt_bind_param($stmt,"si",$role,$user_account);
  mysqli_stmt_execute($stmt);
  
}
header("Location: index.html?signup=success");