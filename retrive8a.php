
<?php
include_once "conn.php";

$role=$_POST['name'];

  






$sql= "SELECT privilege from user_role s inner join account_user_role m on s.role_name = m.account_role_name inner join account_privileges d on d.account_id = m.account_id where s.role_name='".$role."' UNION select privilege from user_role a inner join relation_user_role r on a.role_name = r.relation_role_name inner join relation_privileges rp on r.relation_id = rp.relation_id where a.role_name='".$role."' ";






//$stmt=mysqli_stmt_init($conn);

$result =mysqli_query($conn,$sql);
//echo $result;



while($row=mysqli_fetch_assoc($result)) {
	echo $row['privilege']. "<br>";
}





















