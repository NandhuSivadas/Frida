
<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");



if($_GET["accept"])
   {
	   $did=$_GET["accept"];
	   $delQry="update tbl_user set user_status='1' where user_id='$did'";
	   //echo $delQry;
	   mysql_query($delQry);
	  header("location:UserList.php");
   }
   
   if($_GET["reject"])
   {
	   $did=$_GET["reject"];
	   $delQry="update tbl_user set user_status='2' where user_id='$did'";
	   mysql_query($delQry);
	   header("location:UserList.php");
   }
  
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Userlist</title>
</head>

<body>
<!-- <a href="HomePage.php">Home</a> -->
<h2>User List</h2><br>

<table width="200" border="1" align="center">
  <tr>
    <td>SL NO</td>
    <td>District</td>
    <td>Place</td>
    <td>Name</td>
    <td>Email</td>
    <td>Contact</td>
    <td>Address</td>
    <td>Image</td>
     <td>Proof</td>
   <td>Action</td>
  </tr>
  <?php
  $s=0;
  $selQry= "select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where u.user_status='0'";
	$data= mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	  {
		$s++; 
		  ?>
          
    
     <td><?php echo $s ?></td>
      <td><?php echo $row["district_name"]?></td>
      <td><?php echo $row["place_name"]?></td>
      <td><?php echo $row["user_name"]?></td>
      <td><?php echo $row["user_email"]?></td>
      <td><?php echo $row["user_contact"]?></td>
      <td><?php echo $row["user_address"]?></td>
     <td><img src="../Assets/Files/UserDocs/<?php echo $row["user_image"]?>" width="150" height="150" /></td>
     <td><img src="../Assets/Files/UserDocs/<?php echo $row["user_proof"]?>" width="150" height="150" /></td>
     <td><a href="UserList.php?accept=<?php echo $row["user_id"]?>">Accept</a>/<a href="UserList.php?reject=<?php echo $row["user_id"]?>">Reject</a></td>
     
      
   </tr>
   <?php
	  }
	  ?>
  
</table>

</body>
</html>
<?php
include("Foot.php");
?>