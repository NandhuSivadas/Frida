<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
session_start();
if(isset($_POST["btn_sub"]))
 {
$name=$_POST["txt_name"];
$openstock=$_POST["txt_openingstock"];
$price=$_POST["txt_price"];
$image=$_FILES['txt_image']['name'];
$path=$_FILES['txt_image']['tmp_name'];
move_uploaded_file($path,"../Assets/Files/UserDocs/".$image);
	
$insQry="insert into tbl_product(product_name,product_price,product_image,producttype_id,opening_stock)values('$name','$price','$image','".$_POST["txt_select"]."','$openstock')";
mysql_query($insQry);
 }
?>












<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h2>Product </h2> <br>
  <table width="482" height="219" border="1">
    <tr>
      <td><p>Product type</p></td>
      <td><label for="txt_select"></label>
        <select name="txt_select" id="txt_select">
         
        
          <?php
						$selQry= "select * from tbl_producttype";
						$data= mysql_query($selQry);
						while($row=mysql_fetch_array($data))
	  						{
		  
		  ?>
        		<option value="<?php echo $row["producttype_id"]?>"><?php echo $row["producttype_name"]?></option>
                
                <?php
							}
							?>
    
      </select></td>
    </tr>
    <tr>
      <td>Product Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Opening Stock</td>
      <td><label for="txt_openingstock"></label>
      <input type="text" name="txt_openingstock" id="txt_openingstock" /></td>
    </tr>
    <tr>
      <td>Product Price</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" /></td>
    </tr>
    <tr>
      <td>Product Image</td>
      <td><label for="txt_image"></label>
      <input type="file" name="txt_image" id="txt_image" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Save" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>