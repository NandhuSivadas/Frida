<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

body{
    font-family: 'Montserrat', sans-serif;
    padding:0;
    margin:0;
    background-color: #28223f;

}

*{
    box-sizing: border-box;
}

.container > div{
    display: flex;
    align-items: center;
    justify-content: center;

}

.card{
    background-color: #231e39;
    color:#b3b8cd;
    border-radius: 5px;
    max-width: 350px;
    width:100%;
    box-shadow: 0 10px 20px -10px rgba(0,0,0,.75);
}

.card-header{
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 160px;
    border-radius: 5px 5px 0 0;
    padding: 0 15px;
}

.card-photo{
    height: 120px;
    width:120px;
    border-radius: 50%;
    border: 1px solid #1f1a32;
    padding: 7px;
    background-color: #292343;
    overflow: hidden;
    transform: translateY(calc(50% + 40px));
}

.card-photo img{
    display: inline-block;
    max-width: 100%;
    height: auto;
    border-radius: 50%;
}

.card-body{
    padding: 0 15px 15px;
    text-align: center;
}

.card-name{
    font-size: 25px;
    font-weight: 700;
    margin: 30px 0 0 135px;
}

.card-description{
    font-size: 16px;
    line-height: 21px;
    margin-top: 35px;
}

.card-button{
    margin: 10px 0 40px;
}

.card-button button:first-of-type{
    margin-right: 10px;
}

.btn{
    display: inline-block;
    padding: 10px 25px;
    border-radius: 3px;
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    transition: all .5s ease;
    cursor: pointer;
}
.btn-primary,
.btn-outline-primary{
    border:1px solid #03bfbc;
}

.btn-primary,
.btn-outline-primary:hover{
    color: #231e39;
    background-color: #03bfbc;
}

.btn-primary:hover,
.btn-outline-primary{
    background-color: transparent;
    color: #03bfbc;
}


.card-social{
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    list-style: none;
}

.card-social li{
    padding-right: 20px;
    transition: all .5s ease;
}

.card-social li:last-of-type{
    padding-right: 0;
}

.card-social li a{
    font-size: 20px;
    color:#b3b8cd;
}

.card-social li a:hover{
    color: #03bfbc;
}

</style>
</head>

<body>

<?php
ob_start();
include("Head.php");
include("Validation.php");
	 include("../Assets/connection/connection.php");
	
	 session_start();
	 $sel="select * from tbl_user where user_id='".$_SESSION["userid"]."'";
	 $data=mysql_query($sel);
	 $row=mysql_fetch_array($data);
	 ?>
 


<div class="container">
        <div>
            <div class="card">
                <div class="card-header" style="background-image: url(
                    https://images.unsplash.com/photo-1540228232483-1b64a7024923?ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80);">
                    <div class="card-photo">
                        <img src="../Assets/Templates/user.jpeg" alt="">
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-name"><?php echo $row["user_name"]?></h3>
                    <p class="card-description"><?php echo $row["user_address"]?><br/><?php echo $row["user_contact"]?><br><?php echo $row["user_email"]?></p>
                    <div class="card-button">
                        <button class="btn btn-primary"><a href="EditProfile.php" style="text-decoration: none;"><img src="../Assets/Templates/edit.svg"></a></button>
                        <button class="btn btn-outline-primary"><a href="ChangePassword.php" style="text-decoration: none;"><img src="../Assets/Templates/key.svg"></a></button>
                    </div>
                    <ul class="card-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>