<?php
$fname="";
$lname="";
$gender="";
$marital="";
$basic="";
$TA="";
$DA="";
$HRA="";
$LIC="";
$PF="";
$DED="";
$ss="";
if(isset($_POST["btns"]))
{
	
	 echo "hai";
	 $fname=$_POST["text_no1"];
	 $lname=$_POST["text_no2"];
	 $gender=$_POST["radio"];
	 $marital=$_POST["rad"];
	 $basic=$_POST["text_no6"];
	 $temp=$basic;
	 if($temp>=10000)
	    {
			$TA=($temp*.40);
			$DA=($temp*.35);
			$HRA=($temp*.30);
			$LIC=($temp*.25);
			$PF=($temp*.20);
			$DED=$LIC + $PF;
			$TO=$basic + $TA + $DA + $HRA -($LIC+$PF);

		if($gender=="male")
		 {
			$ss="mr"." ".$fname ." ".$lname;
		 }
		 else
		 {
			 $ss="mrs"." ".$fname." ".$lname; ;		 
		}
		}
}

?>












<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>First Name</td>
      <td><label for="text_no1"></label>
      <input type="text" name="text_no1" id="text_no1" /></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><label for="text_no2"></label>
      <input type="text" name="text_no2" id="text_no2" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="radio" id="text_no3" value="male" />
      <label for="text_no3">male
        <input type="radio" name="radio" id="text_no4" value="female" />
      Female</label></td>
    </tr>
    <tr>
      <td>Martial</td>
      <td><input type="radio" name="rad" id="text_no5" value="married" />
      <label for="text_no5">married
        <input type="radio" name="rad" id="text_no6" value="single" />
      single</label></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="text_no5"></label>
        <select name="text_no5" id="text_no7">
        <option>select</option>
        <option value="bca">bca</option>
      </select></td>
    </tr>
    <tr>
      <td>Basic salary</td>
      <td><label for="text_no6"></label>
      <input type="text" name="text_no6" id="text_no6" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btns" id="btn" value="Submit" />
      <input type="submit" name="btn2" id="btn2" value="cancel" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php	   echo $ss;?></td>
    </tr>
    <tr>
      <td>gender</td>
      <td><?php echo $gender;?></td>
    </tr>
    <tr>
      <td>marital</td>
      <td><?php echo $marital;?></td>
    </tr>
    <tr>
      <td>basic salary</td>
      <td><?php echo $basic; ?></td>
    </tr>
    <tr>
      <td>T.A</td>
      <td><?php echo $TA ;?></td>
    </tr>
    <tr>
      <td>D.A</td>
      <td><?php echo $DA ;?></td>
    </tr>
    <tr>
      <td>H.R.A</td>
      <td><?php echo $HRA ;?></td>
    </tr>
    <tr>
      <td>LIC</td>
      <td><?php echo $LIC ;?></td>
    </tr>
    <tr>
      <td>P.F</td>
      <td><?php echo $PF;?></td>
    </tr>
    <tr>
      <td>DEDUCTION</td>
      <td><?php echo $DED  ;?></td>
    </tr>
    <tr>
      <td>NET</td>
      <td><?php echo $TO ;?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>