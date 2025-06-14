<?php
include("../Assets/connection/connection.php");
if(isset($_POST["btnsave"]))
   {
	   $name=$_POST["txtname"];
	   $inQry="insert into tbl_designation(designation_name)values('$name')";
	   mysql_query($inQry);
   }

if($_GET["did"])
 {
	 $did=$_GET[did];
	 $delQry="delete from tbl_designation where designation_id='$did'";
	 mysql_query($delQry);
	 header("location:DEsignation.php");

 }


















?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DEsignation</title>
</head>

<body>
<a href="../Admin/HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Designation</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="save" />
      <input type="reset" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<table width="200" border="1" align="center">
  <tr>
    <td>Sl No</td>
    <td>Designation</td>
    <td>Action</td>
  </tr>
  <?php
  $s=0;
  $selQry="select * from tbl_designation";
  $data=mysql_query($selQry);
  while($row=mysql_fetch_array($data))
    {
		$s++;
		?>
  <tr>
    <td><?php echo $s ?></td>
    <td><?php echo $row["designation_name"] ?></td>
    <td><a href="DEsignation.php?did=<?php echo $row["designation_id"]?>">delete</a></td>
  </tr>
  <?php
	}
	?>
</table>
<p>&nbsp;</p>
</body>
</html>