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

<div class="outer-div iframe">
<div class="wrapper">
<div class="inner-container">
<div class="con-left">
    <h1 class="heading">
        <?php
        if(isset($_REQUEST["dcod"]))
        {
            $_SESSION["dcod"]=$_REQUEST["dcod"];
        }
        if(isset($_SESSION["dcod"]))
        {
            $obj=new clsdoc();
            $obj->find_rec($_SESSION["dcod"]);
            echo $obj->doctit;
        }
        ?>
    </h1>
<form name="frmdocdet" method="Post" action="frmdocdet.php">
    <p><?php
    echo $obj->docdsc;
    ?></p>
    <p><strong>Uploaded on</strong> :<?php
    echo $obj->docupldat;
    ?></p>
    <p><strong>Shared With :</strong>
    <?php
      $obj1=new clsshr();  
       $arr=$obj1->dspshr($obj->doccod);
    $s="";
    for($i=0;$i<count($arr);$i++)
    {
        $s.=$arr[$i][0].",";
    }
    if(strlen($s)>0)
    {
        $s=  substr($s,0,  strlen($s)-1);
    }
    echo $s;
    ?>
    </p> 
    <?php
    $obj2=new clslst();
    $arr2=$obj2->disp_rec($_SESSION["cod"]);
    for($i=0;$i<count($arr2);$i++)
    {
        if($arr2[$i][0]==$obj->doclstcod)
    echo "<a class=edit href=frmshr.php?dcod=".$obj->doccod." >ShareDocument</a>";
    }
    ?>
    <?php
           $url="../docfil/".$obj->doccod.$obj->docfil;
    ?>
<!--  <iframe src="<?php //echo $url;?>&embded=true"  style="position: absolute;width:100%; height: 100%;border: none;"></iframe>-->
    <div class="iframe">  <iframe src="<?php echo $url;?> " width="150%" height="800">
 <ilayer src="frmdocdet.php">
   <p>See our <a href="frmdocdet.php">newsflashes</a>.</p>
 </ilayer>
</iframe>
    </div>
    </body>
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





<!-- container ends -->

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

