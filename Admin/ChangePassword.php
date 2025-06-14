<?php
include("Validation.php");
include("Head.php");
	 include("../Assets/connection/connection.php");
	 session_start();
	  
	
	
	if(isset($_POST["btn_update"]))
{
	
	
	$sel="select * from tbl_admin where admin_id='".$_SESSION["adminid"]."'";
	$data=mysql_query($sel);
	$row=mysql_fetch_array($data);
	$db_password=$row["admin_password"];
	
	$current_password=$_POST["current_password"];
	$new_password=$_POST["new_password"];
	$re_password=$_POST["re_password"];
	
	
	if($db_password==$current_password)
	{
		if($new_password==$re_password)
		{
		  $upQry = "update tbl_admin set admin_password='$new_password' where admin_id='".$_SESSION["adminid"]."'";
		
		  if($data=mysql_query($upQry))
		  {
			echo "Password Updated";
		  }
		   else
		  {
			echo "Failed" ;
		  }
		}
		else
		{
			echo "Password Mismatch!!";
		}
	}
	else
	{
		echo "Invalid current password";
	}
	}
	
	?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Style::ChangePassword</title>
</head>

<body>

<form id="form1" name="from1" method="post" >
<table width="309" border="1">
  <tr>
    <td width="165">Current password</td>
    <label for="current_password"></label>
    <td width="128"><input type="password" name="current_password"></td>
  </tr>
  <tr>
    <td>New Password</td>
    <label for="new_password"></label>
    <td><input type="password" name="new_password"></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <label for="re_password"></label>
    <td><input type="password" name="re_password"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <input type="submit" name="btn_update" id="btn_update" value="Change password">
    </td>
    
  </tr>
</table>
</form>
</body>
<?php
include("Foot.php");
?>
</html>