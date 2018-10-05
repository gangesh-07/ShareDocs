<?php
session_start();
include_once '../buslogic.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- Stylesheets -->
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/sty.css" rel="stylesheet" type="text/css"/>
<link href="../css/layout.css" rel="stylesheet" type="text/css"/>


</head>

<body>
<div class="header">
<div class="wrapper">
<div class="logo"><img src="../images/logo.jpg" alt="logo" /> </div>
<div class="nav-menu">

            <ul id="nav">
                <li><a href="frmmydoc.php">My Documents</a></li>
    <li><a href="frmshrdoc.php">Shared Documents</a></li>
    <li><a href="frmdoc.php">Upload New Document</a></li>
                    <?php
if($_SESSION["cod"]!=null)
{
    echo "<li><a class=login-btn href=../index.php?e=f>LogOut</a></li>";
}  else {
    echo "<li><a class=login-btn href=../frmlog.php>Login</a></li>";
}


?>       
            
            </ul>

        </div>
</div>
<!-- wrapper ends -->
</div>
<!-- header section ends -->

<div class="outer-div">
<div class="wrapper">
<div class="inner-container">
<div class="con-left">
<h1 class="heading">Shared Documents</h1>
<form name="frmshrdoc" method="Post" action="frmshrdoc.php">
  
    <?php
    if(isset($_SESSION["cod"]))
    {
       
        $obj=new clsshr();
        $arr=$obj->dspshrdoc($_SESSION["cod"]);
      //  print_r($arr);
       
        if(count($arr)>0)
  echo "<table width=100% ><tr><th>Document Title</th><th>Uploaded Date</th></tr>";
        for($i=0;$i<count($arr);$i++)
        {
            echo "<tr><td>".$arr[$i][1]."</td>";
            echo "<td>".$arr[$i][5]."</td>";
echo "<td><a href=frmdocdet.php?dcod=".$arr[$i][0]." >View Detail</a>";
echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</form>
</div>
<!-- con-left ends here -->

<!-- con-right ends -->
</div>
<!-- inner container ends -->
</div>
<!-- wrapper ends here -->
</div>

<div class="footer">
<div class="wrapper">
<ul>

<li><a href="http://www.cssoftsolutions.com/">CCopyright Cs-Soft-Solution,s</a></li>  
<li>|</li>  
<li><a href="../frmabt.php">About Us</a></li> 
</ul>
<p>Copyright © 2016 Share-Doc</p>
</div>
</div>
<!-- footer ends -->
</body>
</html>

