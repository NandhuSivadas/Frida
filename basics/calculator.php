<?php
$result="";
$n01="";
$n02="";
if (isset($_POST["btn_add"]))
    {
      echo "hai";
      $n01=$_POST["text_n01"];
      $n02=$_POST["text_n02"];
      $result=$n01 + $n02;
	  echo $result;
      }
 ?>    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calculator</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="315" border="1">
  <tr>
    <td width="88" height="55">Number1</td>
    <td width="211">
      <label for="text_n01"></label>
      <input type="text" name="text_n01" id="text_n01" />
  </td>
  </tr>
  <tr>
    <td height="57">Number2</td>
    <td>
      <label for="text_02"></label>
      <input type="text" name="text_n02" id="text_n02" />
    </td>
  </tr>
  <tr>
    <td height="83" colspan="2">
      <input type="submit" name="btn_add" id="btn_add" value="add" />
      <input type="submit" name="btn_sub" id="btn_sub" value="Sub" />
      <input type="submit" name="btn_mul" id="btn_mul" value="mul" />
      <input type="submit" name="btn_div" id="btn_div" value="div" />
   </td>
  </tr>
  <tr>
    <td height="83">result</td>
    <td> <?php echo $result;?></td>
  </tr>
</table>
 </form>
</body>
</html>
