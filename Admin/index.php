
<?php 
session_start();
include '../functions/functions.php';
if(!isset($_SESSION['admin_email'])){
    header("location:admin_login.php");
} else{
    ?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin_panel</title>

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
                         <h1> Hello Admin..</h1> 
                         <h3>Welcome to Admin panel</h3>   
                 </div>
              </div>
      </header>
      <!--user details-->
                        <div class="col-lg-2">
                        <div class='container'>
                            <h3>Manage Content...</h3>
                                <ul class='nav'>
                                    <li>
                                        <a href='index.php?view_users' target='_self'>
                                        <i class='glyphicon glyphicon-cog'></i>
                                        View_users</a>
                                   </li>
                                    <li>
                                        <a href='index.php?view_posts' target='_self'>
                                            <i class='glyphicon glyphicon-cog'></i>
                                            View_posts </a>
                                    </li>
                                    <li>
                                        <a href='index.php?view_comments' target='_self'>
                                            <i class='glyphicon glyphicon-cog'></i>
                                           View_comments </a>
                                    </li>
                                    
                                    
                                    <li>
                                        <a href='index.php?view_topics' target='_self'>
                                            <i class='glyphicon glyphicon-cog'></i>
                                           View_topics </a>
                                    </li>
                                    <li >
                                        <a href='admin_logout.php' target='_self'>
                                            <i class='glyphicon glyphicon-log-out'></i>
                                           Admin_Logout </a>
                                    </li>
                                    
                                </ul>
                                </div>
                       </div>
      <!--user details edit sectoin-->
    <div class="col-lg-10" id="content" style='height:500px; overflow-y: scroll'>
                            <?php
                            if(isset($_GET['view_users'])){
                                include 'includes/view_users.php';
                            }
                            ?>
                            
                            <?php
                            if(isset($_GET['view_posts'])){
                                include 'includes/view_posts.php';
                            }
                            ?>
                           
                             <?php
                            if(isset($_GET['view_comments'])){
                                include 'includes/view_comments.php';
                            }
                            ?>
                              <?php
                            if(isset($_GET['view_topics'])){
                                include 'includes/view_topics.php';
                            }
                            ?>
                        </div>
                        
                        
                        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php } 