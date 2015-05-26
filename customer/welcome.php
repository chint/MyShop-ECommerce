
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="http://localhost/shop/web/web/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>



<!-- <body>
<a href="#" class="btn   btn-success"
   data-toggle="modal"
   data-target="#basicModal">Click to Login</a>

   <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div> -->

<?php
 session_start();
 
     // $sessionvar = $this->GetLoginSessionVar();
      
     if(!empty($_SESSION['OK']))
     {
        // return false;
        if(!empty($_SESSION['Admin'])){
          echo '<div class="alert alert-success" role="alert">
<strong> Welcome Admin,'.$_SESSION['un'].'</strong>
          </div>';
          echo '<form action="" method="post"><input type="submit" class="btn btn-warning btn-xs pull-right" value=" Logout "/></form>';
echo '<a href="cart.php" class="btn btn-success btn-xs pull-left"  target="_parent" ><span class="glyphicon glyphicon-shopping-cart"></span>My Cart</a>';
        }else{
          echo '<p class="text-right lead"  > Welcome,<strong>'.$_SESSION['un'].'</strong></label><br><form action="" method="post"><input type="submit" class="btn btn-warning btn-xs pull-right" value=" Logout "/> </form>';
echo '<a href="cart.php" class="btn btn-success btn-xs pull-left" target="_parent"  ><span class="glyphicon glyphicon-shopping-cart"></span>My Cart</a>';
        }

        
     }else{
   echo "not logged in";
  header("Location: login.php");
}

function refresh( )  {  
 
   if(a==0){
  
    
   }
   
 } 


if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(session_destroy())
{
  echo "<script type='text/javascript'>window.parent.location.reload(true)</script>";
// header("Location: login.php");
}
}


?>
</body>
</html>