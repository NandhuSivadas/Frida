<?php
	 include("../Assets/connection/connection.php");
	 $err="";
	 session_start();
	 
	if(isset($_POST['btnlogin']))
	{
		$selQry="select * from tbl_admin where admin_email='".$_POST['txtuname']."' and admin_password='".$_POST['txtpass']."'";
        //echo $selQry;
		$dataAdmin=mysql_query($selQry);
		
		
		
		
				
		$selUser="select * from tbl_user where user_email='".$_POST['txtuname']."' and user_password='".$_POST['txtpass']."' and user_status='1'";
        $dataUser=mysql_query($selUser);
		$rowUser=mysql_fetch_array($dataUser);
		$countUser=mysql_num_rows($dataUser);
		
		$selManager="select * from tbl_manager where manager_email='".$_POST['txtuname']."' and manager_password='".$_POST['txtpass']."'";
        $dataManager=mysql_query($selManager);
		$rowManager=mysql_fetch_array($dataManager);
		$countManager=mysql_num_rows($dataManager);
		
		
		
        if($rowAdmin=mysql_fetch_array($dataAdmin))
         {
              $_SESSION['adminname']=$rowAdmin["admin_name"];
              $_SESSION['adminid']=$rowAdmin["admin_id"];
              header('location:../Admin/HomePage.php');
         }
		else  if($countUser>0)
         {
              $_SESSION['username']=$rowUser["user_name"];
              $_SESSION['userid']=$rowUser["user_id"];
			  
              header('location:../User/HomePage.php');
         }
		 else  if($countManager>0)
         {
              $_SESSION['managername']=$rowManager["manager_name"];
              $_SESSION['managerid']=$rowManager["manager_id"];
			  
              header('location:../Manager/Homepage.php');
         }
      	else
	  	{
                 $err= "Invalid password";
	  	}
   }
?>

<style>
	body
	{
		background-image:url("../Assets/Templates/Login/images/log-bg.jpg");
		background-size:cover;
		margin: 0;
	}
	.main-con{
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-items: center;
		/* margin-top:200px; */
		height:683px;
	}

	.text-box {
		padding:14px 36px;
		border:none;
		border-radius:10px;	
		}

	.login-btn {
		padding:10px 30px;
		border:none;
		border-radius:10px;
		background-color:white;
	}

	.login-btn:hover {
		background-color:#e4e3e3;
		transition:0.5s;
	}

	.sec-con {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		gap: 1rem;
		padding: 40px;
		background-color: #ffffff82;
		border-radius: 18px;
	}

	.bg-col
	{
		background-color: #000000b3;
		/* margin: 0px; */
		height: 100%;
	}
</style>

<body>
	<div class="bg-col">
		<form action="" method="post">
			<div class="main-con">
				<div class="sec-con">
					<div><input class="text-box" type="text" name="txtuname" placeholder="Email"></div>
					<div><input class="text-box" type="password" name="txtpass" placeholder="Password"></div>
					<?php echo $err; ?>
					<div><input type="submit" value="Login" class="login-btn" name="btnlogin"></div>

				</div>
			</div>
		</form>
	</div>
</body>


