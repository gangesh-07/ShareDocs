



<?php
session_start();
include_once 'buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $a=$obj->logincheck($_POST["txteml"], $_POST["txtpwd"]);
    if($a==-1)
        $msg="Email Password Incorrect";
    else
    {
       $_SESSION["cod"]=$a;
       header("location:user/frmdoc.php");
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- Stylesheets -->
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="header">
<div class="wrapper">
<div class="logo"><img src="images/logo.jpg" alt="logo" /> </div>
<a class="login-btn" href="frmlog.php">Login</a>
<a class="login-btn" href="index.php">Sign-Up</a>

</div>
<!-- wrapper ends -->
</div>
<!-- header section ends -->

<div class="outer-div">
<div class="wrapper">
<div class="inner-container">
<div class="con-left">
<img alt="pc-sharing" src="images/pc-sharing.png">
<h2>WHAT'S SHAREDOC?</h2>
<p>A good document sharing web application is one of the crucial requirements for successful businesses and official work. Through a good document sharing application the user can easily access his documents from anywhere and anytime without the hassles of carrying the hard copy or even the soft copy in the form of pen drives or CDs. FileShare allows user to create and share your work online. User can upload from and save to his desktop. User can edit anytime and from anywhere. User can pick who can access his documents and share changes in real time. The files are stored securely online. FileShare gives user the freedom to access and work his documents anywhere. Get to the Internet and login to all your documents. Create, edit, share and collaborate with others.</p>
</div>
<!-- con-left ends here -->

<div class="con-right">
<div class="sign-up-box">
<img src="images/sign-img.png" alt="sign-img"  />
<form name="frmlog" method="Post" action="frmlog.php">
<h3>Sign In</h3>
<input type="text"  placeholder="Email"  name="txteml" required=""  />
<input type="password" placeholder="Password" name="txtpwd" required="" />
<input type="Submit" name="btnsub" value="Login" class="login-btn"/>

<?php
if(isset($msg))
    echo $msg;
?>
</form>
</div>
<!-- sign up box -->
</div>
<!-- con-right ends -->
</div>
<!-- inner container ends -->
</div>
<!-- wrapper ends here -->
</div>
<!-- outer div ends -->



<div class="footer">
<div class="wrapper">
<ul>

<li><a href="http://www.cssoftsolutions.com/">Copyright Cs-Soft-Solution,s</a></li>  
<li>|</li>  
<li><a href="frmabt.php">About Us</a></li> 
</ul>
<p>Copyright © 2016 Share-Doc</p>
</div>
</div>
<!-- footer ends -->
</body>
</html>

