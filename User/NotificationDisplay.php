<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Notification Display</title>

</head>

<center>
<body>
  <br>
<h2>Notifications</h2><br>

<table border="1" >
  <tr>
    <td>Sl No</td>
    <td>Title</td>
    <td>Detail</td>
    <td>File</td>
    <td>Photo</td>
  </tr>
  <?php
  $s=0;
  $selQry="select * from tbl_notification";
  $data=mysql_query($selQry);
  while($row=mysql_fetch_array($data))
    {
		$s++;
		?>
  <tr>
     <td><?php echo $s ?></td>
    <td><?php echo $row["notification_title"]?></td>
    <td><?php echo $row["notification_details"]?></td>
     <td><img src="../Assets/Files/UserDocs/<?php echo $row["notification_file"]?>" width="250" height="170" /></td>
     <td><img src="../Assets/Files/UserDocs/<?php echo $row["notification_proof"]?>" width="250" height="170" /></td>   
      
 
  </tr>
     <?php
	}
	?>
</table>
</body>
</center>
</html>

<?php
include("Foot.php");
?>