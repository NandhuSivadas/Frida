<?php
include("../Assets/connection/connection.php");
if(isset($_POST["btn_sub"]))
 {
	 $date=$_POST["txt_date"];
	 $qty=$_POST["txt_qty"];
	
	 $inQry="insert into tbl_productsale(sale_date,sale_qty,user_id,product_id)values('$date','$qty','".$_POST["txt_select"]."','".$_POST["txt_selproduct"]."')";
	 mysql_query($inQry);
	 echo $inQry;
	 
	 $selQry="select * from tbl_product where product_id='".$_POST["txt_selproduct"]."'";
	 echo $selQry;
	 $data=mysql_query($selQry);
	 $row=mysql_fetch_array($data);
	 $stock=$row["opening_stock"];
	 echo "OUr Stock is :: ".$stock;
	 if($stock > $qty)
	    {
	      
	 $reduceStock=$stock- $qty;
	 $upQry="update tbl_product set opening_stock='$reduceStock' where product_id='".$_POST["txt_selproduct"]."'";
	mysql_query($upQry);
		}
	else
	{
	echo "not enough product";
	}
 }
 ?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProductSales</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>UserName</td>
      <td><label for="txt_select"></label>
        <select name="txt_select" id="txt_select">
         
        
          <?php
						$selQry= "select * from tbl_user";
						$data= mysql_query($selQry);
						while($row=mysql_fetch_array($data))
	  						{
		  
		  ?>
        		<option value="<?php echo $row["user_id"]?>"><?php echo $row["user_name"]?></option>
                
                <?php
							}
							?>
    
      </select></td>
     
    </tr>
    <tr>
      <td>Product</td>
      <td><label for="txt_selproduct"></label>
        <select name="txt_selproduct" id="txt_selproduct">
          
      
         
        
          <?php
						$selQry= "select * from tbl_product";
						$data= mysql_query($selQry);
						while($row=mysql_fetch_array($data))
	  						{
		  
		  ?>
        		<option value="<?php echo $row["product_id"]?>"><?php echo $row["product_name"]?></option>
                
                <?php
							}
							?>
      </select></td>
    </tr>
    <tr>
      <td>Sale Date</td>
      <td><label for="txt_date"></label>
      <input type="text" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Sale Qty</td>
      <td><label for="txt_qty"></label>
      <input type="text" name="txt_qty" id="txt_qty" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Save" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>