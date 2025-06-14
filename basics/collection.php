<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Collection</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>UserName</td>
      <td>
      <label for="text_no2"></label>
      <select name="text_no2" id="text_no2">
        <option>..select...</option>
        <?php
		$selQry="select * from tbl_user";
		$data=mysql_query("$selQry");
		while($row=mysql_fetch_array($data))
		     {
				  ?>
                  <option value="<?php echo $row["user_id"]?>"><?php echo $row["user_name"]?></option>
				  <?php
			 }
			 ?>
				  
      </select>
      </td>
    </tr>
    <tr>
      <td>Collection Quatity</td>
      <td><label for="txtQautity"></label>
      <input type="text" name="txtQautity" id="txtQautity" /></td>
    </tr>
    <tr>
      <td>Collection Quality</td>
      <td><label for="txtQuality"></label>
      <input type="text" name="txtQuality" id="txtQuality" /></td>
    </tr>
    <tr>
      <td height="50">Collection Details</td>
      <td><label for="txtDetails"></label>
      <textarea name="txtDetails" id="txtDetails" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
      <input type="submit" name="btnCancel" id="btnCancel" value="SCancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>