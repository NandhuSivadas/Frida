<?php

include("../Assets/connection/connection.php");



if(isset($_POST["btnsave"]))  
  {
	     $categoryname=$_POST["txtcategory"];
		 $insQry="insert into tbl_category(category_name)values('$categoryname')";
		 mysql_query($insQry);
		 
  }
  
  
   if($_GET["did"])
   {
	   $did=$_GET["did"];
	   $delQry="delete from tbl_category where category_id='$did'";
	   mysql_query($delQry);
	   header("location:Category.php");
   }

?>


 
 


















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Diary::Category</title>
</head>

<body>
<a href="../Admin/HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="470" height="113" border="1" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Category Name</td>
      <td><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategory" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>



 <table border="1" align="center">
 
 
    <tr>
      <td>Sl No</td>
      <td>Category</td>
      <td>Action</td>
    </tr>
    
    
    <?php
	$s=0;
	$selQry= "select * from tbl_category";
	$data= mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	  {
		  $s++;
		  ?>
          
    
    <tr>
      <td><?php echo $s ?></td>
      <td><?php echo $row["category_name"]?></td>
      <td><a href="Category.php?did=<?php echo $row["category_id"]?>">Delete</a></td>
    </tr>
    <?php
	  }
	  ?>
      </table>
   