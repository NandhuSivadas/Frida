<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
session_start();
if(isset($_POST["btn_sub"]))
 {
	 $date=$_POST["txt_date"];
	 $qty=$_POST["txt_quatity"];
	 $_SESSION['stock']=$qty;

	 $inQry="insert into tbl_productstock(stock_date,stock_quantity,product_id)values('$date','$qty','".$_POST["txt_select"]."')";
	 mysql_query($inQry);
	 $selQry="select * from tbl_product where product_id='".$_POST["txt_select"]."'";
	 $data=mysql_query($selQry);
	 $row=mysql_fetch_array($data);
	 $addStock=$row["opening_stock"] + $qty;
	 echo $addStock;
 $upQry = "update tbl_product set opening_stock='$addStock' where product_id='".$_POST["txt_select"]."'";
	echo $upQry;
	 mysql_query($upQry);
	 
	 
	 
	 
	 
	 
 }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AddStock</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <h2>Add Stock</h2> <br>
  <table width="391"  border="1">
    <tr>
      <td><p>Product Name</p></td>
      <td><label for="txt_select"></label>
        <select name="txt_select" id="txt_select">
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
      <td>Stock Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Stock Quantity</td>
      <td><label for="txt_quatity"></label>
      <input type="text" name="txt_quatity" id="txt_quatity" /></td>
    </tr>
    <tr>
      <td height="24" colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Save" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
    $(function () {
        //console.log("haii")
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;


        console.log(maxDate);
        $('#txt_date').attr('min', maxDate);
    });
</script>