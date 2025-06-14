<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
if(isset($_POST['btn_sub']))
 {
	 $title=$_POST["title"];
	 $detail=$_POST["detail"];
	 $image=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/UserDocs/".$image);
	
	$proof=$_FILES['fileproof']['name'];
	$pathproof=$_FILES['fileproof']['tmp_name'];
	move_uploaded_file($pathproof,"../Assets/Files/UserDocs/".$proof);
 
 $insQry="insert into tbl_notification (notification_title,notification_details,notification_photo,notification_file)values('$title','detail','$image','$proof')";
 mysql_query($insQry);
 }
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notification</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h2>Notifications</h2><br>
  <table width="200" border="1">
    <tr>
      <td>Title</td>
      <td><label for="text_no1"></label>
      <input type="text" name="title" id="title" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="text_no2"></label>
      <textarea name="detail" id="detail" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="text_no3"></label>
      <input type="file" name="file_image" id="file_image" /></td>
    </tr>
    <tr>
      <td>File</td>
      <td><label for="text_no4"></label>
      <input type="file" name="fileproof" id="fileproof" /></td>
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