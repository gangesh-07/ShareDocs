


<?php
session_start();
include_once '../buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsdoc();
    $obj->doctit=$_POST["txtdoctit"];
    $obj->docdsc=$_POST["txtdsc"];
    $obj->doclstcod=$_POST["drplst"];
    $obj->docupldat=date('y-m-d');
    $s=$_FILES["filupl"]["name"];
    if($s!="")
        $s=  substr ($s,  strrpos ($s,'.'));
    $obj->docfil=$s;
    $a=$obj->save_rec();
    move_uploaded_file($_FILES["filupl"]["tmp_name"],
            "../docfil/".$a.$s);
    header("location:frmmydoc.php");
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
<div class="nav-menu" >

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
<form name="frmdoc" method="Post" action="frmdoc.php" enctype="multipart/form-data" onsubmit="return abc()">
    <table width="100%">
        <tr>
            <td width="200px">Select List</td>
            <td>
                <select class="form-control" name="drplst">
        <?php
        $obj=new clslst();
        $arr=$obj->disp_rec($_SESSION["cod"]);
        for($i=0;$i<count($arr);$i++)
        {
 echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
        }
        ?>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="frmlst.php">Create New List</a>
            </td>
        </tr>
        <tr>
            <td>Document Title</td>
            <td>
                <input class="form-control" type="text" name="txtdoctit" id="txttit"/>
            </td>
        </tr>
        <tr>
            <td>Document Description</td>
            <td>
                <textarea class="form-control" name="txtdsc" rows="6" cols="70" id="txtdsc"></textarea>
            </td>
        </tr>
        <tr>
            <td>Document File</td>
            <td>
                <input type="file" name="filupl"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
    <input type="Submit" name="btnsub" value="Submit"/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="reset" name="btncan" value="Cancel"/>
            </td>
        </tr>
    </table>
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

<li>|</li>
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
