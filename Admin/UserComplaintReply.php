	<?php
	
	include("Validation.php");
	include("../Assets/connection/connection.php");
	include("Head.php");
	
	session_start();
	
	
	if(isset($_POST["btn_sub"]))
	  {
			
			 $upQry="update tbl_complaint set complaint_reply='".$_POST["text_no1"]."',compliant_status='1' where complaint_id='". $_SESSION["cid"]."'";
			 echo $upQry;
			 mysql_query($upQry);
			 
			 //header("location:UserComplaintSolvedList.php");	
			 
	  }
	
	 ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>UserComplaintReply</title>
	</head>
	
	<body>
	<!-- <a href="../Assets/HomePage.php">Home</a> -->
	<form id="form1" name="form1" method="post" action="">
	  <h2>User Complaint Reply</h2><br>
	  <table width="200" border="1" align="center">
		<tr>
		  <td>Reply</td>
		  
		  <td><label for="text_no1"></label>
		  <textarea name="text_no1" id="text_no1"></textarea></td>
		</tr>
		<tr>
		  <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
		  <!-- <input type="reset" name="btn_re" id="btn_sub" value="cancel" /></td> -->
		</tr>
	  </table>
	  
	</form>
	
	  
	</body>
	</html>
	<?php
	include("Foot.php");
	ob_flush();
	?>
