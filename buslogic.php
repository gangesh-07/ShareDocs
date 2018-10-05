<?php
include_once 'config.php';
class clsreg
{
    public $regcod,$regeml,$regpwd,$regdat;
    
    public function logincheck($eml,$pwd)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call logincheck('$eml','$pwd',@cod)";
        $res=  mysqli_query($link, $qry);
        $r=  mysqli_query($link,"select @cod");
        $a=mysqli_fetch_row($r);
        $con->db_close();
        return $a[0];
    }
    
    public function save_rec()
    {
      $con=new clscon();  
      $link=$con->db_connect();
      $qry="call insreg('$this->regeml','$this->regpwd','$this->regdat')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
    public function update_rec()
    {
       
      $con=new clscon();  
      $link=$con->db_connect();
      $qry="call updreg('$this->regcod','$this->regeml','$this->regpwd','$this->regdat')";
      $res=  mysqli_query($link, $qry);
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
     
    }
    public function find_rec($rcod)
    {
        $con=new clscon();  
      $link=$con->db_connect();
      $qry="call findreg($rcod)";
      $res=  mysqli_query($link, $qry);
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->regcod=$r[0];
       $this->regeml=$r[1];
       $this->regpwd=$r[2];
       $this->regdat=$r[3];
      }
      
    }
    public function delete_rec()
    {
            $con=new clscon();
    $link=$con->db_connect();
    $qry="call delreg($this->regcod)";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }
    public function srcusr($str,$rcod,$dcod)
    {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call srcusr('$str','$rcod','$dcod')";
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
}
class clslst
{
    public $lstcod,$lstnam,$lstdsc,$lstregcod;
    public function save_rec()
    {
    $con=new clscon();
    $link=$con->db_connect();
    $qry="call inslst('$this->lstnam','$this->lstdsc','$this->lstregcod')";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }
     public function update_rec()
    {
       
      $con=new clscon();  
      $link=$con->db_connect();
      $qry="call updlst('$this->lstcod','$this->lstnam','$this->lstdsc','$this->lstregcod')";
      $res=  mysqli_query($link, $qry);
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
     
    }
      public function find_rec($lcod)
    {
        $con=new clscon();  
      $link=$con->db_connect();
      $qry="call findlst($lcod)";
      $res=  mysqli_query($link, $qry);
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->lstcod=$r[0];
       $this->lstnam=$r[1];
       $this->lstdsc=$r[2];
       $this->lstregcod=$r[3];
      }
      
    }
    public function delete_rec()
    {
            $con=new clscon();
    $link=$con->db_connect();
    $qry="call dellst($this->lstcod)";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }
    public function disp_rec($rcod)
    {
      $con=new clscon();
        $link=$con->db_connect();
        $qry="call displst($rcod)";
       
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar; 
    }
    
    
    
}
class clsdoc
{
    public $doccod,$doctit,$doclstcod,$docdsc,$docfil,$docupldat;
    public function save_rec()
    {
      $con=new clscon();  
      $link=$con->db_connect();
      $qry="call insdoc('$this->doctit','$this->doclstcod','$this->docdsc','$this->docfil','$this->docupldat',@cod)";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      $r=  mysqli_query($link,"select @cod");
       $con->db_close();
       $t=  mysqli_fetch_row($r);
       return $t[0]; 
    }
    public function update_rec()
    {
       
      $con=new clscon();  
      $link=$con->db_connect();
        $qry="call upddoc('$this->doccod','$this->doctit','$this->doclstcod','$this->docdsc','$this->docfil','$this->docupldat')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
     
    }
    public function find_rec($dcod)
    {
        $con=new clscon();  
      $link=$con->db_connect();
      $qry="call finddoc($dcod)";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->doccod=$r[0];
       $this->doctit=$r[1];
       $this->doclstcod=$r[2];
       $this->docdsc=$r[3];
       $this->docfil=$r[4];
       $this->docupldat=$r[5];
       
      }
      
    }
    public function delete_rec()
    {
            $con=new clscon();
    $link=$con->db_connect();
    $qry="call deldoc($this->doccod)";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }
    public function dspdocbylst($lcod)
    {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call dspdocbylst($lcod)";
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }    
}
class clsshr
{
   public $shrcod,$shrdat,$shrdoccod,$shrregcod;
    public function save_rec()
    {
      $con=new clscon();  
      $link=$con->db_connect();
      $qry="call insshr('$this->shrdat','$this->shrdoccod','$this->shrregcod')";
      $res=  mysqli_query($link, $qry);
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
     public function update_rec()
    {
      $con=new clscon();  
      $link=$con->db_connect();
      $qry="call updshr($this->shrcod,'$this->shrdat','$this->shrdoccod','$this->shrregcod')";
      $res=  mysqli_query($link, $qry);
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    } 
       public function find_rec($scod)
    {
        $con=new clscon();  
      $link=$con->db_connect();
      $qry="call findshr($scod)";
      $res=  mysqli_query($link, $qry);
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->shrcod=$r[0];
       $this->shrdat=$r[1];
       $this->shrdoccod=$r[2];
       $this->shrregcod=$r[3];
      }
      
    }
     public function delete_rec()
    {
            $con=new clscon();
    $link=$con->db_connect();
    $qry="call delshr($this->shrcod)";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }
       public function dspshr($dcod)
    {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call dspshr('$dcod')";
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    
    
     public function dspshrdoc($rcod)
    {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call dspshrdoc($rcod)";
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    
    
}
?>