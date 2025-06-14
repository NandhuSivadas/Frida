<?php

include("../Assets/connection/connection.php");



if(isset($_POST["btnsave"]))  
  {
	     $categoryname=$_POST["selcategory"];
		 $subcatname=$_POST["txtsubcat"];
		 $insQry="insert into tbl_subcategory(subcat_name,category_id)values('$subcatname','$categoryname')";
		 mysql_query($insQry);
		 
  }
  
  
   if($_GET["did"])
   {
	   $did=$_GET[did];
	   $delQry="delete from tbl_subcategory where subcat_id='$did'";
	   mysql_query($delQry);
	   header("location:Subcategory.php");
   }

?>












<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subcategory</title>
</head>

<body>
<a href="../Admin/HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="342" height="160" border="1" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Category</td>
      <td><label for="selcategory"></label>
      
      
        <select name="selcategory" id="selcategory">
        
          <?php
						$selQry= "select * from tbl_category";
						$data= mysql_query($selQry);
						while($row=mysql_fetch_array($data))
	  						{
		  
		  ?>
        		<option value="<?php echo $row["category_id"]?>"><?php echo $row["category_name"]?></option>
                
                <?php
							}
							?>
      </select>
      
      
      </td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><label for="txtsubcat"></label>
      <input type="text" name="txtsubcat" id="txtsubcat" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>



 <table border="1" align="center">
 
 
    <tr>
      <td>Sl No</td>
      <td>SubCategory</td>
      <td>Category</td>
      <td>Action</td>
    </tr>
    
    
    <?php
	$s=0;
	$selQry= "select * from tbl_subcategory sc inner join tbl_category c on sc.category_id=c.category_id";
	$data= mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	  {
		  $s++;
		  ?>
          
    
    <tr>
      <td><?php echo $s ?></td>
      <td><?php echo $row["subcat_name"]?></td>
      <td><?php echo $row["category_name"]?></td>
      <td><a href="Subcategory.php?did=<?php echo $row["subcat_id"]?>">Delete</a></td>
    </tr>
    <?php
	  }
	  ?>
      </table>
   