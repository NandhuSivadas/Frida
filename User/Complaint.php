<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
session_start();
if(isset($_POST["btnsub"]))
   {
	 $title=$_POST["txttitle"];
	 $details=$_POST["txtdetails"];
	 $insQry="insert into tbl_complaint(complaint_title ,complaint_details,user_id)values('$title','$details','".$_SESSION['userid']."')";
	
	mysql_query($insQry);
   }
   
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h2>Complaint</h2>
<table width="200" border="1">
  <tr>
    <td>Title</td>
    <td>
      <label for="txttitle"></label>
      <input type="text" name="txttitle" id="txttitle" />
   </td>
  </tr>
  <tr>
    <td>Details</td>
    <td>
      <label for="txtdetails"></label>
      <textarea name="txtdetails" id="txtdetails" cols="45" rows="5"></textarea>
      <label for="txtdetiails"></label></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="btnsub" id="btnsub" value="Submit" />
    </td>
  </tr>
  
</table>
</form>
</body
></html>
<?php
include("Foot.php");
?>