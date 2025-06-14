
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>
</head>

<body>
<?php
include("Validation.php");
include("Head.php");
	 include("../Assets/connection/connection.php");
	
	 session_start();
	 $sel="select * from tbl_manager where manager_id='".$_SESSION["managerid"]."'";
	 $data=mysql_query($sel);
	 $row=mysql_fetch_array($data);
	 ?>
<form id="form1" name="form1" method="post" action="">
  <h2>My Profile</h2> <br>
  <table width="300" border="1">
    <tr>
      <td colspan="2"><img src="" /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label for="text_no1"></label>
      <?php echo $row["manager_name"]?></td>
    </tr>
 
    <tr>
      <td>Email</td>
      <td><label for="text_no3"></label><?php echo $row["manager_email"]?></td>
     
    </tr>
 
   
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>