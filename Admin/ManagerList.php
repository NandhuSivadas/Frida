<?php
include("Validation.php");
include("../Assets/connection/connection.php");



if($_GET["accept"])
   {
	   $did=$_GET["accept"];
	   $delQry="update tbl_manager set manager_status='1' where manager_id='$did'";
	   //echo $delQry;
	   mysql_query($delQry);
	  header("location:ManagerList.php");
   }
   
   if($_GET["reject"])
   {
	   $did=$_GET["reject"];
	   $delQry="update tbl_manager set manager_status='0' where manager_id='$did'";
	   mysql_query($delQry);
	   header("location:ManagerList.php");
   }
  
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ManagerList</title>
</head>

<body>
<a href="HomePage.php">Home</a>

<h4>ManagerListActive</h4>
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
  $selQry= "select * from tbl_manager u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where u.manager_status='1'";
	$data= mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	  {
		$s++; 
		  ?>
          
    
     <td><?php echo $s ?></td>
      <td><?php echo $row["district_name"]?></td>
      <td><?php echo $row["place_name"]?></td>
      <td><?php echo $row["manager_name"]?></td>
      <td><?php echo $row["manager_email"]?></td>
      <td><?php echo $row["manager_contact"]?></td>
      <td><?php echo $row["manager_address"]?></td>
     <td><img src="../Assets/Files/ManagerDocs/<?php echo $row["manager_image"]?>" width="150" height="150" /></td>
     <td><img src="../Assets/Files/ManagerDocs/<?php echo $row["manager_proof"]?>" width="150" height="150" /></td>
     <td><a href="ManagerList.php?reject=<?php echo $row["manager_id"]?>">Inactive</a></td>
     
      
   </tr>
   <?php
	  }
	  ?>
  
</table>




<h4>ManagerListInActive</h4>
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
  $selQry= "select * from tbl_manager u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where u.manager_status='0'";
	$data= mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	  {
		$s++; 
		  ?>
          
    
     <td><?php echo $s ?></td>
      <td><?php echo $row["district_name"]?></td>
      <td><?php echo $row["place_name"]?></td>
      <td><?php echo $row["manager_name"]?></td>
      <td><?php echo $row["manager_email"]?></td>
      <td><?php echo $row["manager_contact"]?></td>
      <td><?php echo $row["manager_address"]?></td>
     <td><img src="../Assets/Files/ManagerDocs/<?php echo $row["manager_image"]?>" width="150" height="150" /></td>
     <td><img src="../Assets/Files/ManagerDocs/<?php echo $row["manager_proof"]?>" width="150" height="150" /></td>
     <td><a href="ManagerList.php?accept=<?php echo $row["manager_id"]?>">Active</a></td>
     
      
   </tr>
   <?php
	  }
	  ?>
  
</table>


</body>
</html>
