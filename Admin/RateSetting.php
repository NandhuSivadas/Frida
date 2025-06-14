<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
if(isset($_POST["btn_sub"]))
   {
$fatvalue=$_POST["txt_fatvalue"];
$reading=$_POST["txt_reading"];
$litre=$_POST["txt_litre"];
$rate=$_POST["txt_rate"];
$inQry="insert into tbl_ratesetting(rate_fatvalue,rate_reading,rate_litre,rate_rate)values('$fatvalue','$reading','$litre','$rate')";
mysql_query($inQry);
   }
   if($_GET["did"])
    {
		$did=$_GET[did];
		$delQry="delete from tbl_ratesetting where rate_id='$did'";
	    mysql_query($delQry);
		header("location:RateSetting.php");
	}
	
	?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rate Setting</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <h2>Rate Setting</h2><br>
  <table width="300" border="1">
    <tr>
      <td>Fat Value</td>
      <td><label for="txt_fatvalue"></label>
      <input type="text" name="txt_fatvalue" id="txt_fatvalue" /></td>
    </tr>
    <tr>
      <td>Lactometer Reading</td>
      <td><label for="txt_reading"></label>
      <input type="text" name="txt_reading" id="txt_reading" /></td>
    </tr>
    <tr>
      <td>Litre</td>
      <td><label for="txt_litre"></label>
      <input type="text" name="txt_litre" id="txt_litre" /></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><label for="txt_rate"></label>
      <input type="text" name="txt_rate" id="txt_rate" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Save" />
      <!-- <input type="reset" name="txt_cancel" id="txt_cancel" value="Cancel" /></td> -->
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<table width="876" height="247" border="1">
  <tr>
    <td>Sl No</td>
    <td>Rate Fat</td>
    <td>Rate Reading</td>
    <td>Rate Litre</td>
    <td>Rate Amount </td>
    <td>Action</td>
  </tr>
  <?php
  $s=0;
  $selQry="select * from tbl_ratesetting";
  $data=mysql_query($selQry);
  while($row=mysql_fetch_array($data))
    {
		$s++;
     ?> 
  <tr>
    <td><?php echo $s ?> </td>
    <td><?php echo $row["rate_fatvalue"] ?></td>
    <td><?php echo $row["rate_reading"] ?></td>
    <td><?php echo $row["rate_litre"] ?></td>
    <td><?php echo $row["rate_rate"] ?></td>
    <td><a href="RateSetting.php?did=<?php echo $row["rate_id"]?>">Delete</a></td>
     
  </tr>
  <?php
	}
	?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
include("Foot.php");
?>