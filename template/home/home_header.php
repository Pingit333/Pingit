<!DOCTYPE html>
<?php
session_start();
include './functions/functions.php';
include './includes/connection.php';
include './functions/alerts.php';
if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
}

    /* for user timelinesection detail fatching */
    $user = $_SESSION['user_email'];
    $get_user = "select * from users  where user_email= '$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);

    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_pass = $row['user_pass'];
    $user_birthday=$row['user_b_day'];
    $user_email = $row['user_email'];
    $user_country = $row['user_country'];
    $user_gender = $row['user_gender'];
    $user_image = $row['user_image'];
    $register_date = $row['register_date'];
    $last_login = $row['last_login'];
    
    $user_post = "select * from posts  where user_id= '$user_id'";
    $run_posts = mysqli_query($con, $user_post);
    $postscount= mysqli_num_rows($run_posts);
    
      $sel_msg = "select * from messages where receiver='$user_id' AND status='unread' order by 1 DESC";
      $run_msg = mysqli_query($con, $sel_msg);
      $count_msg = mysqli_num_rows($run_msg);
    
    ?>
<html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Ping_It</title>

            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/timeline.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="css/user_home.css" rel="stylesheet">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
            <style>
                
#card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 600px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

#container {
  padding: 0 16px;
}

#container::after {
  content: "";
  clear: both;
  display: table;
}

#title {
  color: grey;
  font-size: 18px;
}



#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal1 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: auto;
    max-width: 300px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
</style>
        </head>
        <body>

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand page-scroll" href="#page-top">Ping_It</a>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden">
                                <a class="page-scroll" href="#page-top"></a>
                            </li>

                            <li>
                                <a class="page-scroll" href="home.php">Home</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#posts">Timeline</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="member.php">Member</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="logout.php">Logout</a>
                            </li>
                            <li class="page-scroll" style="color: white">
                                Topic :
                            </li>
    <?php
    $get_topics = "select * from topics";
    $run_topics = mysqli_query($con, $get_topics);

    while ($row = mysqli_fetch_array($run_topics)) {
        $topic_id = $row['topic_id'];
        $topic_titile = $row['topic_titile'];
         echo " <li > <a class='page-scroll' href='topic.php?topic=$topic_id'> $topic_titile </a></li>";
    }
    ?>
                        </ul>
                        <form method="get" action="results.php" id="form1" class="form form-inline " style="float: right">
                            <input type="text" class=" form-control" name="user_query" placeholder="search..."/>
                            <button class="btn btn-default form-control"  name="search" type="submit"><i class="glyphicon glyphicon-search"></i>search</button>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->  
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.nav end -->  


            <!-- user timeline -->
            <section id="usertimeline" class="usertimeline" >
                <div class="container">
                    <div class="row">
                        <div id="user_account_section"class="col-lg-3">
                            <!--profile sidebar-->
                            <div class="profile-sidebar">
    <?php
    /* SIDEBAR USERPIC */
    echo "
                            <div class='profile-userpic' '>
                              <img  id='myImg' src='./user/user_images/$user_image' class='img-responsive ' style='  alt='No image found...'>
                                  
                                    <div id='myModal1' class='modal1' style='padding-top:150px'>
                                    <span class='close' id='close'style='padding-top:120px'>&times;</span>
                                        <img class='modal-content img-circle'  id='img01'>
                                        <div id='caption'><h2>$user_name...<h2></div>
                            </div>
                              </div>";
    
    /* END SIDEBAR USERPIC */

    /* SIDEBAR USER TITLE */
    echo "
                            <div class='profile-usertitle'>
                                <div class='profile-usertitle-name'style='text-transform: uppercase;'>
                                    $user_name
                                </div>
                                <div class='profile-usertitle-job'>
                                    Developer
                                </div>
                            </div>";
    /* END SIDEBAR USER TITLE */
    ?>

                                <!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                    <button type="button"  class="btn btn-success btn-sm">Follow  <span class='badge'style='background-color:white'>()</span></button>
                                    <a href='my_messages.php?inbox&u_id=$user_id' target='_self'>
                                        <button type="submit" class="btn btn-danger btn-sm" >Message 
                                            <span class='badge'style='background-color:white'>
                                                ()
                                            </span>
                                        </button>
                                    </a>
                                </div>
                                <!-- END SIDEBAR BUTTONS -->

                                <!-- SIDEBAR MENU1 -->    
    <?php
    echo "
                             <div class='profile-usermenu'>
                                
                                <ul class='nav'>
                                    <li>
                                        <a href=' #myModal' data-toggle='modal'>
                                        <i class='glyphicon glyphicon-info-sign 'style='color:black'></i>
                                        Details</a>
                                   </li>
                                    <li>
                                        <a href='my_messages.php?inbox&u_id=$user_id' target='_self'>
                                            <i class='glyphicon glyphicon-envelope'style='color:yellow'></i>
                                            Inbox <span class='badge'style='background-color:green'> $count_msg<span> </a>
                                    </li>
                                    <li>
                                        <a href='sent.php?sentbox&u_id=$user_id' target='_self'>
                                            <i class='glyphicon glyphicon-envelope' style='color:red'></i>
                                            Sent </a>
                                    </li>
                                    <li>
                                        <a href='my_posts.php?u_id=$user_id' target='_self'>
                                            <i class='glyphicon glyphicon-tags'style='color:yellow'></i>
                                            My_posts <span class='badge'style='background-color:green'> $postscount</span></a>
                                    </li>
                                    
                                    
                                    <li>
                                        <a href='edit_profile.php?u_id=$user_id' target='_self'>
                                            <i class='glyphicon glyphicon-cog'style='color:blue'></i>
                                            Account Settings </a>
                                    </li>
                                    <li >
                                        <a href='logout.php' target='_self'>
                                            <i class='glyphicon glyphicon-log-out'style='color:black'></i>
                                            Logout </a>
                                    </li>
                                    
                                </ul>
                                </div>";
    ?>
                                <!-- END MENU 1-->
                            </div>
                            <!-- profile sidebar 1-->
                        </div>
                        <!--user_account_section end -->


<script>
// Get the modal
var modal = document.getElementById('myModal1');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.captionText = value;
}

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>