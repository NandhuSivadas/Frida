<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");

if(isset($_POST['btn_submit']))
{
	
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$address=$_POST['txt_address'];
	$place=$_POST['sel_place'];
	$password=$_POST['txt_password'];
	
	$image=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/ManagerDocs/".$image);
	
	$proof=$_FILES['fileproof']['name'];
	$pathproof=$_FILES['fileproof']['tmp_name'];
	move_uploaded_file($pathproof,"../Assets/Files/ManagerDocs/".$proof);
	
	
	$ins="insert into tbl_manager(manager_name,manager_email,manager_contact,manager_password)
	values('".$name."','".$email."','".$contact."','".$password."')";
	echo $ins;
	
	if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			window.location="ManagerRegistartion.php";
		</script>
        <?php
	}
	else
	{
		echo "Insert Failed";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ManagerRegistartion</title>
</head>
<body>

<div align="center" id="tab">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<h2>Manager Registration</h2><br><br>
  <table width="300" border="1">
  
<!--   
  <tr>
      <th><div align="left">District</div></th>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)">
          <option>--SELECT--</option>
           <?php
		$selQry = "select * from tbl_district";
		$data = mysql_query($selQry);
		while($row = mysql_fetch_array($data))
		{
		?>
        <option value="<?php echo $row['district_id']  ?>"><?php echo $row['district_name']  ?></option>
        <?php
		}
		?>
      </select></td>
    </tr> -->
    
<!--     
    
    <tr>
      <th><div align="left">Place</div></th>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
          <option>--SELECT--</option>
      </select></td>
    </tr> -->
    
    
    
    
    <tr>
      <th><div align="left">Name</div></th>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"required="required"title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <th><div align="left">Email</div></th>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email"required="required"  /></td>
    </tr>
    <tr>
      <th><div align="left">Contact</div></th>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9"/></td>
    </tr>
    <!-- <tr>
      <th><div align="left">Address</div></th>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address"required="required" /></td>
    </tr>
     -->
    
    <tr>
      <th><div align="left">Password</div></th>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password"required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/></td>
    </tr>
    <!-- <tr>
      <th><div align="left">Image</div></th>
      <td><label for="file_image"></label>
      <input type="file" name="file_image" id="file_image"required="required" /></td>
    </tr> -->
     <!-- <tr>
      <th><div align="left">Proof</div></th>
      <td><label for="file_image"></label>
      <input type="file" name="fileproof" id="fileproof"required="required" /></td>
    </tr> -->
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <!-- <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td> -->
    </tr>
  </table>
</form>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/ajaxpages/ajaxplace.php?did=" + did,
		success: function(data) {
		
			$("#sel_place").html(data);

		}
	});
}

</script>





</html>
<?php
include("Foot.php");
?>
