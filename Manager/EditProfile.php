<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Style:::MangerEditProfile</title>
</head>

<body>
<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
	
	 session_start();
	 if(isset($_POST["btn_sub"]))
	 {
		 $update="update tbl_society set manager_name='".$_POST["text_no1"]."',manager_contact='".$_POST["text_no2"]."' where manager_id='".$_SESSION["managerid"]."'";
		 mysql_query($update);
		 header("location:MyProfile.php");
	 }
	 $sel="select * from tbl_manager where manager_id='".$_SESSION["manager_id"]."'";
	 $data=mysql_query($sel);
	 $row=mysql_fetch_array($data);
	 ?>
<form id="form1" name="form1" method="post" action="">
  <h2>Edit Profile</h2> <br>
  <table width="300" border="1">
    <tr>
      <td>Name</td>
      <td><label for="text_no1"></label>
      <input type="text" name="text_no1" id="text_no1"  value="<?php echo $row["manager_name"]?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="text_no2"></label>
      <input type="text" name="text_no2" id="text_no2" value="<?php echo $row["manager_contact"]?>"/></td>
    </tr>

    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>