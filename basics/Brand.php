<?php
include("../Assets/connection/connection.php");
if(isset($_POST["btnsave"]))
  {
	  $name=$_POST["txtname"];
	  $inQry="insert into tbl_brand(brand_name)values('$name')";
	  mysql_query($inQry);
  }
  
  if($_GET["did"])
   {
	   $did=$_GET[did];
	   $delQry="delete from tbl_brand where brand_id='$did'";
	   mysql_query($delQry);
	   header("location:brand.php");
   }
?>

<a href="../Admin/HomePage.php">Home</a>
<form name="form1" method="post" action="">
  <table border="1" align="center">
    <tr>
      <td width="53" height="86">Brand Name</td>
      <td width="226"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit">
      <input type="reset" name="btncancel" id="btncancel" value="Cancel"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<br />
<table width="200" border="1" align="center">
  <tr>
    <td>SL No</td>
    <td>brand Name</td>
    <td>action</td>
  </tr>
  <?php
   $s=0;
   $selQry="select * from tbl_brand";
   $data=mysql_query($selQry);
   while($row=mysql_fetch_array($data))
   {
	   $s++;  
   ?>
   
  <tr>
    <td><?php echo $s ?></td>
    <td><?php echo  $row["brand_name"]?> </td>
    <td><a href="Brand.php?did=<?php echo $row["brand_id"]?>">delete</a></td>
   <?php
   }
   ?>
  </tr>
</table>