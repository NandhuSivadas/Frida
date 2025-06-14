<?php
include("../Assets/connection/connection.php");
session_start();
if(isset($_POST["btn_sub"]))
 {
	 $type=$_POST["txt_productname"];
	 $inQry="insert into tbl_producttype(producttype_name)values('$type')";
	 mysql_query($inQry);
	 $selQry="select * from tbl_producttype";
	 $data=mysql_query( $selQry);
	 $row=mysql_fetch_array($data);
	 $_SESSION['producttypeid']=$row["producttype_id"];
 }


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProductType</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Product Type name</td>
      <td><label for="txt_productname"></label>
      <input type="text" name="txt_productname" id="txt_productname" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Save" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>