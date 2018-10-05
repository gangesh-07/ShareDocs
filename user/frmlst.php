<?php
session_start();
include_once '../buslogic.php';
if(isset($_POST["btnupd"]))
{
    $obj=new clslst();
    $obj->lstcod=$_SESSION["lcod"];
    $obj->lstnam=$_POST["txttit"];
    $obj->lstdsc=$_POST["txtdsc"];
    $obj->lstregcod=$_SESSION["cod"];
    $obj->update_rec();
    unset($_SESSION["lcod"]);
}
if(isset($_POST["btnsub"]))
{
    $obj=new clslst();
    $obj->lstnam=$_POST["txttit"];
    $obj->lstdsc=$_POST["txtdsc"];
    $obj->lstregcod=$_SESSION["cod"];
    $obj->save_rec();
}
if(isset($_REQUEST["lcod"]))
{
    $obj=new clslst();
    $obj->find_rec($_REQUEST["lcod"]);
    $tit=$obj->lstnam;
    $dsc=$obj->lstdsc;
    $_SESSION["lcod"]=$_REQUEST["lcod"];
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
<link href="../css/layout.css" rel="stylesheet" type="text/css"/>
<script>     
   function abc()
    {
   var a=document.getElementById('txttit').value;
   var b=document.getElementById('txtdsc').value;
   if(a=='')
   {
       alert('please enter title');
   return false;
   }
   else if(b=='')
   {
       alert('please enter description');
       return false;
   }
    }
</script>
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
<h1 class="heading">Upload New Document</h1>
<form name="frmlst" method="Post" action="frmlst.php" onsubmit="return abc()">
    <table width="100%" >
        <tr>
            <td>List Title</td>
            <td>
                <input type="text" name="txttit" id="txttit"
     value="<?php if(isset($tit)) echo $tit; ?>"
                       />
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <textarea name="txtdsc" rows="7" cols="70" id="txtdsc"><?php if(isset($dsc))echo $dsc;?></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
  <?php
  if(isset($_SESSION["lcod"]))
      echo "<input type=submit name=btnupd value=Update />";
  else
     echo "<input type=submit name=btnsub value=Submit />";
 ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="btncan" value="Cancel"/>        
            </td>
        </tr>
    </table>
    <?php
    $obj=new clslst();
    $arr=$obj->disp_rec($_SESSION["cod"]);
    
    if(count($arr)>0)
        echo "<table width=100% class=formlist ><tr><th>Title</th><th>Description</th></tr>";
    for($i=0;$i<count($arr);$i++)
    {
      echo "<tr><td>".$arr[$i][1]."</td>";
      echo "<td>".$arr[$i][2]."</td>";
      echo "<td><a class=edit href=frmlst.php?lcod=".$arr[$i][0]."&mode=E >Edit</a>";
      echo "</td></tr>";
    }
       echo "</table>";
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
<!-- outer div ends -->

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

