<?php
include("Validation.php");
include("Head.php");
include("../Assets/connection/connection.php");
  	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserComplaintSolvedList</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <h2>User Complaint Solved List </h2><br>
  <table width="200" border="1">
    <tr>
      <td>Sl NO</td>
      <td>Title</td>
      <td>Deatils</td>
      <td>Reply</td>
      <td>UserName</td>
      <td>Contact</td>
      <td>Email</td>
   
    </tr>
<?php
$s=0;
$selQry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id where c.compliant_status='1'";
$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
  {
	$s++;
?>
    <tr>
      <td><?php echo $s?></td>
      <td><?php echo $row["complaint_title"] ?></td>
      <td><?php  echo $row["complaint_details"] ?></td>
      <td><?php  echo $row["complaint_reply"] ?></td>
       <td><?php  echo $row["user_name"] ?></td>
        <td><?php  echo $row["user_contact"] ?></td>
           <td><?php  echo $row["user_email"] ?></td>
       
    </tr>
    <?php
  }
  ?>
	
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>