
<?php 
session_start();
include 'includes/connection.php';
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ping_it Admin_panel</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]><![endif]-->
      <script src="../js/html5shiv.min.js"></script>
      <script src="../js/respond.min.js"></script>
    
  </head>
  <body>
    
    <header>
              <div class="jumbotron">
                  <div class ="container">
                         <h1> Ping_It...</h1> 
                         <h3>Welcome to Admin panel</h3>   
                 </div>
              </div>
      </header>
      <div class="col-lg-10" id="content">
          
           <div class="form-group"> 
                                    <center><h2  >
                                       Sign_in Admin... 
                                    </h2></center>
               <center>
                                    <form action="" method="post" >

                            <!-- start email -->
                            <div class="form-group row">

                                <label for="uemail" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-share-alt"></span>  Admin_Email  </label>
                                <div class="col-lg-9">
                                    <input type="email" name="a_email" class="form-control" placeholder="enter admin_email" required>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                               <!-- start password -->
                            <div class="form-group row">
                                <label for="uPass" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-share-alt"></span>  Admin_Password</label>
                                <div class="col-lg-9">
                                    <input type="password" name="a_pass" class="form-control"  placeholder="enter admin_password" required>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                            <!-- /end password -->
                            <!-- /sign in button -->
                             <div class="form-group row">
                                 <label for="submit" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-share-alt"></span>  Submit</label>
                                  <div class="col-lg-9">
                                      <button type="submit"  name="admin_signin" class="btn btn-block btn-success"> Admin Sign_in <span class=" glyphicon glyphicon-log-in"></span></button>
                                      </div>
                             </div>
                            <!-- /end sign in button -->
                            </form>
</center>                            
      </div>
      
                  
         <?php
         if(isset($_POST['admin_signin'])){
             
             $ad_email= mysqli_real_escape_string($con,$_POST['a_email']);
             $ad_pass=mysqli_real_escape_string($con,$_POST['a_pass']);;
             
             $get_admin="select * from admins where admin_email='$ad_email'AND admin_pass='$ad_pass'";
             $run_admin= mysqli_query($con, $get_admin);
             
             $check_admin= mysqli_num_rows($run_admin);
             
             if($check_admin==0){
                  echo "<script>alerts('you entered wrong email and password.please try again...')</script>";
             }
             else{
                 $_SESSION['admin_email']=$ad_email;
                 echo "<script>window.open('index.php','_self')</script>";
             }
         }
         ?>               
                        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>