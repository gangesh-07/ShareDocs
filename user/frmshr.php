<?php
session_start();
include_once '../buslogic.php';
if(isset($_REQUEST["rcod"]))
{
    $obj=new clsshr();
    $obj->shrdat=date('y-m-d');
    $obj->shrdoccod=$_SESSION["dcod"];
    $obj->shrregcod=$_REQUEST["rcod"];
    $obj->save_rec();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- Stylesheets -->
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/sty.css" rel="stylesheet" type="text/css"/>
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
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
<h1 class="heading">Share Document
<?php
if(isset($_REQUEST["dcod"]))
    $_SESSION["dcod"]=$_REQUEST["dcod"];
if(isset($_SESSION["dcod"]))
{
    $obj=new clsdoc();
    $obj->find_rec($_SESSION["dcod"]);
    echo $obj->doctit;
}
?>
</h1>
<form name="frmshr" method="Post" action="frmshr.php" >
    <table>
        <tr>
            <td>Search User</td>
            <td>
     <input type="text" name="txtusr"/>
            </td>
            <td>
 <input class=sub-btn type="Submit" name="btnsub" value="Search"/>
            </td>
        </tr>
    </table>
    <?php
    if(isset($_POST["btnsub"]))
    {
    $obj=new clsreg();
    $arr=$obj->srcusr($_POST["txtusr"]."%", $_SESSION["cod"], $_SESSION["dcod"]);
    echo "<table width=100% ><tr><th>Search Results</th><tr>";
    for($i=0;$i<count($arr);$i++)
    {
        echo "<tr><td>".$arr[$i][1]."</td>";
        echo "<td><a class=edit href=frmshr.php?rcod=".$arr[$i][0]." >Share</a>";
        echo "</td></tr>";
        echo "<tr><td colspan=2><hr /></td></tr>";
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

<li><a href="http://www.cssoftsolutions.com/">Copyright Cs-Soft-Solution,s</a></li>  
<li>|</li>  
<li><a href="../frmabt.php">About Us</a></li> 
</ul>
<p>Copyright © 2016 Share-Doc</p>
</div>
</div>
<!-- footer ends -->
</body>
</html>
