<?php
include("../Assets/connection/connection.php");
if(isset($_POST["btnsave"]))
   {
	   $name=$_POST["txtname"];
	   $designation=$_POST["select"];
	   $conatact=$_POST["txtcontact"];
	   $email=$_POST["txtemail"];
   $insQry="insert into tbl_employee(employee_name,designation_id,employee_contact,employee_email)values('$name','$designation','$conatact','$email')";
   mysql_query($insQry);
   echo $insQry;
    header("location:Employee.php");
   }
   
   
   
     if($_GET["did"])
   {
	   $did=$_GET[did];
	   $delQry="delete from tbl_employee where employee_id='$did'";
	   mysql_query($delQry);
	   header("location:Employee.php");
   }
   
   ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee</title>
</head>

<body>
<a href="../Admin/HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center">

      <tr>
        <td width="94">Name</td>
        <td width="530"><label for="txtname2"></label>
          <input type="text" name="txtname" id="txtname2" /></td>
      </tr>
      <tr>
        <td>Designation</td>
        <td><label for="txtdesignation"></label>
          <label for="select"></label>
          <select name="select" id="select">
           <?php
		$selQry="select * from tbl_designation";
		$data=mysql_query("$selQry");
		while($row=mysql_fetch_array($data))
		     {
				  ?>
                  <option value="<?php echo $row["designation_id"]?>"><?php echo $row["designation_name"]?></option>
				  <?php
			 }
			 ?>
          </select></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><label for="txtcontact"></label>
          <input type="text" name="txtcontact" id="txtcontact" /></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><label for="txtemail"></label>
          <input type="email" name="txtemail" id="txtemail" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="save" />
          <input type="reset" name="btncancel" id="btncancel" value="cancel" /></td>
      </tr>
    </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<table width="200" border="1">
  <tr>
    <td>Sl No</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Enail</td>
    <td>Designation</td>
  </tr>
  <tr>
   </tr>
  <?php
  $s=0;
  $selQry="select * from tbl_employee e inner join tbl_designation d on e.designation_id=d.designation_id";
  $data=mysql_query($selQry);
  while($row=mysql_fetch_array($data))
    {
		$s++;
		?>
  <tr>
    <td><?php echo $s ?></td>
    <td><?php echo $row["employee_name"] ?></td>
    <td><?php echo $row["employee_contact"] ?></td>
    <td><?php echo $row["employee_email"] ?></td> 
     <td><?php echo $row["designation_name"] ?></td>
      <td><a href="Employee.php?did=<?php echo $row["employee_id"]?>">delete</a></td>
  </tr>
  <?php
	}
	?>
   
  </tr>
</table>

</body>
</html>