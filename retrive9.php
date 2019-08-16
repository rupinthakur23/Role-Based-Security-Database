
<?php
include_once "conn.php";

$ID=$_POST['ID'];

  





$sql= $sql= "SELECT privilege from user_account usr inner join user_role s on usr.Role_name_useraccount=s.role_name inner join account_user_role m on s.role_name = m.account_role_name inner join account_privileges d on d.account_id = m.account_id where usr.id=".$ID." UNION select privilege from user_account usr inner join user_role a on usr.Role_name_useraccount=a.role_name inner join relation_user_role r on a.role_name = r.relation_role_name inner join relation_privileges rp on r.relation_id = rp.relation_id where usr.id=".$ID." ";



//$stmt=mysqli_stmt_init($conn);

$result =mysqli_query($conn,$sql);
//echo $result;



while($row=mysqli_fetch_assoc($result)) {
	echo $row['privilege']. "<br>";
}
