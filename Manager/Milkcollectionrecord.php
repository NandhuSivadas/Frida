<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
if(isset($_POST["btn_sub"]))
   {
	   
  $userid=$_POST["txt_select"];
  $date=$_POST["txt_date"];
  $fatvalue=$_POST["txt_fatvalue"];
  $reading=$_POST["txt_reading"];
  $litre=$_POST["txt_litre"];
  
  
  		$selRate="select * from tbl_ratesetting where rate_fatvalue='".$_POST['txt_fatvalue']."' and rate_reading='".$_POST['txt_reading']."'";
        $dataRate=mysql_query($selRate);
		$rowRate=mysql_fetch_array($dataRate);
		$countRate=mysql_num_rows($dataRate);
		
        if($countRate>0)
         {
		
  				$_SESSION['rateamount']=$rowRate["rate_rate"];
				$amt=$_SESSION['rateamount'];
				$total=$litre*$amt;
				
				  $inQry="insert into tbl_milkcollection(user_id,collection_date,collection_fatvalue,collection_reading,collection_litre,collection_totalamt)values('$userid','$date','$fatvalue','$reading','$litre','$total')";
  
  mysql_query($inQry);
		 }
   }

   if($_GET["did"])
    {
		$did=$_GET["did"];
		$delQry="delete from tbl_milkcollection where collection_id='$did'";
	    mysql_query($delQry);
		echo $delQry;
		header("location:Milkcollectionrecord.php");
	}
	
  
  
  ?>


















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Milkcollection</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <h2>Milk collection</h2>
  <table  border="1">
    <tr>
      <td>Username</td>
      <td><label for="txt_username"></label>
        <label for="txt_select"></label>
        <select name="txt_select" id="txt_select">
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
	
      </select></td>
    </tr>
    <tr>
      <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Fat value</td>
      <td><label for="txt_fatvalue"></label>
      <input type="text" name="txt_fatvalue" id="txt_fatvalue" /></td>
    </tr>
    <tr>
      <td>Lactometer reading</td>
      <td><label for="txt_reading"></label>
      <input type="text" name="txt_reading" id="txt_reading" /></td>
    </tr>
    <tr>
      <td>No:of litre</td>
      <td><label for="txt_litre"></label>
      <input type="text" name="txt_litre" id="txt_litre" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Save" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<table border="1">
  <tr>
    <td>Sl.No</td>
    <td>Date</td>
    <td>Fat</td>
    <td>Reading</td>
    <td>litre</td>
    <td>Total Amt</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Photo</td>
    <td>Action</td>
  </tr>
   <?php
  $s=0;
  $selQry="select * from tbl_milkcollection r inner join tbl_user u on r.user_id=u.user_id";
  $data=mysql_query($selQry);
  while($row=mysql_fetch_array($data))
    {
		$s++;
     ?> 
  <tr>
    <td><?php echo $s ?></td>
    <td><?php echo $row["collection_date"] ?></td>
    <td><?php echo $row["collection_fatvalue"] ?></td>
    <td><?php echo $row["collection_reading"] ?></td>
    <td><?php echo $row["collection_litre"] ?></td>
    <td><?php echo $row["collection_totalamt"] ?></td>
    <td><?php echo $row["user_name"] ?></td>
    <td><?php echo $row["user_contact"] ?></td>
     <td><img src="../Assets/Files/UserDocs/<?php echo $row["user_image"]?>" width="150" height="150" /></td>
       <td><a href="Milkcollectionrecord.php?did=<?php echo $row["collection_id"]?>">Delete</a></td>
    

  <?php
	}
	?>
</table>

</body>
</html>
<?php
include("Foot.php");
?>