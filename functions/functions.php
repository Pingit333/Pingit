<?php

global $con;
$con = mysqli_connect("localhost", "root", "", "pingit")or die("connection was not established");

/* func for getting new members */

function member(){
    
                 
global $con;               /* for user timelinesection detail fatching */
                               
    $get_member = "select * from users";
    $run_member = mysqli_query($con, $get_member);
   
    while($row = mysqli_fetch_array($run_member)){

    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_image = $row['user_image'];
    
  echo "
      
                            <a href='user_profile.php?u_id=$user_id' data-toggle='tooltip ' title='$user_name'>
                            <div class='profile-userpic' '>
                                   "
                                . "     <P>"
                                        . "<img src='./user/user_images/$user_image' class='img-responsive'  style=' width: 15% ; height: 15%;  alt=''>
                                        </p>
                                        </div>
                                    </a> <h3>$user_name</h3>   
                              ";
    }
}




/* func for getting topic and topic id */

function gets_topic() {
    $get_topics = "select * from topics";
    /* @var $con type */
    global $con;
    $run_topics = mysqli_query($con, $get_topics);

    while ($row = mysqli_fetch_array($run_topics)) {
        $topic_id = $row['topic_id'];
        $topic_titile = $row['topic_titile'];
        echo " <option value='$topic_id '> $topic_titile</option>";
    }
}

/* @function for isert posts into posts data base */

function insert_post() {

    if (isset($_POST['sub'])) {
        global $con;
        global $user_id;
        $titile = $_POST['title'];
        $content = $_POST['content'];
        $topic = $_POST['topic'];


        $insert = "insert into posts (user_id,topic_id,post_titile,post_content,post_date)values ('$user_id','$topic','$titile','$content',NOW())";


        $run_insert = mysqli_query($con, $insert);

        if ($run_insert) {


            $update = "update users set posts = 'yes' where user_id='$user_id'";
            $run_update = mysqli_query($con, $update);
        }
    }
}

/* function for display posts */

function get_posts() {
    global $con;

    $per_page = 5; /* per page contain 5 posts */
    if (isset($_GET['page'])) {
        $page = $_GET['page']; /* get page data into page variable */
    } else {
        $page = 1; /* by default there will be single page shown */
    }
    $start_from = ($page - 1) * $per_page;

    $get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from,$per_page";
    /* it fatch posts form db and put it on page per page there wil be five posts from starting page */
    $run_posts = mysqli_query($con, $get_posts);


    while ($row_posts = mysqli_fetch_array($run_posts)) {
        $user_id = $row_posts['user_id'];
        $post_id = $row_posts['post_id'];
        $post_date = $row_posts['post_date'];
        $content = $row_posts['post_content'];
        $post_titile = $row_posts['post_titile'];



        /* getting user info form db who posts on time line */
        $user = "select * from users  where user_id= '$user_id' AND posts='yes'";
        $run_user = mysqli_query($con, $user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['user_name'];
        $user_image = $row['user_image'];


        /* DISPLAY POSTS */
        echo "
<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' id = '$post_id'>
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'avatar pull-left'><a href = 'user_profile.php?u_id=$user_id'><img class='img-circle' src='./user/user_images/$user_image' ></a></div>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'>$user_name</div></h5>
</div>
<div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>$post_date</span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>by </span>
<span class = 'qa-message-who-data'><a href='user_profile.php?u_id=$user_id'>$user_name </a>on $post_titile</span>
</span>
</div>
</div>
</div>
</div>
<div class='panel panel-default' style='width:auto; ' >
    <div class='panel-body text-justify'>$content</div>
  </div>
    <a href='single.php?post_id=$post_id'>
        <button class='form-control btn-success' style='width: 200px'>
                                        See reply or Reply to this
        </button>
    </a>
                                        
                                
                               
</div>
</div> 
	";
    }
    include 'pagination.php';
}

function single_post() {

    if (isset($_GET['post_id'])) {
        global $con;
        $get_id = $_GET['post_id'];
        $get_posts = "select * from posts  where post_id='$get_id'";
        /* it fatch posts form db and put it on page per page there wil be five posts from starting page */
        $run_posts = mysqli_query($con, $get_posts);


        $row_posts = mysqli_fetch_array($run_posts);
        $user_id = $row_posts['user_id'];
        $post_id = $row_posts['post_id'];
        $post_date = $row_posts['post_date'];
        $content = $row_posts['post_content'];
        $post_titile = $row_posts['post_titile'];

        
         /* for user timelinesection detail fatching */
    
        /* getting user info form db who posts on time line */
        $user = "select * from users where user_id= '$user_id' AND posts='yes' ";
        $run_user = mysqli_query($con, $user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['user_name'];
        $user_image = $row['user_image'];
        echo $user_name;
        echo $user_id;

        /*get user detail for commented post*/
    $user_com = $_SESSION['user_email'];
    $get_com = "select * from users  where user_email= '$user_com'";
    $run_com = mysqli_query($con, $get_com);
    $row_com = mysqli_fetch_array($run_com);

    $user_com_id = $row_com['user_id'];
    $user_com_name = $row_com['user_name'];
    
echo $user_com_name;
        echo $user_com_id;

        /* DISPLAY POSTS */
        echo "
<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' id = '$post_id'>
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'avatar pull-left'><a href = 'user_profile.php?user_id=$user_id'><img class='img-circle' src='./user/user_images/$user_image' ></a></div>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'>$user_name</div></h5></div><div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>$post_date</span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>by </span>
<span class = 'qa-message-who-data'><a href='user_profile.php?user_id=$user_id'>$user_name </a>on $post_titile</span>
</span>
</div>
</div>
</div>
</div>

<div style='width:auto;overflow-wrap: break-word; ' class='panel panel-default'>
    <div class='panel-body text-justify'>$content</div>
  </div>

        
</div>
</div> ";
       
include ("comments.php");
        echo "
<form method='post' action='' id='reply'>
                            <div class='form-group'>
                                <textarea class='form-control' name='comment' placeholder='Write your comment here...?' 
                                          style='height: 250px; text-align: justify' required></textarea>
                            </div>
                            <div class='form-group'>
                                <button type='submit'  class='form-control btn-success'  name='reply'>post your comment...</button>
                            </div>
</form>
    ";

        if (isset($_POST['reply'])) {
            global $con;
            $comment = $_POST['comment'];

            $insert = "insert into comments (post_id,user_id,comment,date,comment_author) values ('$post_id','$user_id','$comment',NOW(),'$user_com_name')";

            $run_com = mysqli_query($con, $insert);

           echo "<script>alert('your comment is posted!');</script>";
            echo "<script>window.open('home.php','_self')</script>";
        }
         
    }
}


//function for getting category and topics
function get_cats() {
    global $con;

    $per_page = 5; /* per page contain 5 posts */
    if (isset($_GET['page'])) {
        $page = $_GET['page']; /* get page data into page variable */
    } else {
        $page = 1; /* by default there will be single page shown */
    }
    $start_from = ($page - 1) * $per_page;

/* @var $_GET type */
    if (isset($_GET['topic'])){
        $topic_id = $_GET['topic'];
    }
 

    /* @var $topic_id type */
    $get_posts = "select * from posts where topic_id='$topic_id' ORDER by 1 DESC LIMIT $start_from,$per_page";
    /* it fatch posts form db and put it on page per page there wil be five posts from starting page */
    $run_posts = mysqli_query($con, $get_posts);


    while ($row_posts = mysqli_fetch_array($run_posts)) {
        $user_id = $row_posts['user_id'];
        $post_id = $row_posts['post_id'];
        $post_date = $row_posts['post_date'];
        $content = $row_posts['post_content'];
        $post_titile = $row_posts['post_titile'];



        /* getting user info form db who posts on time line */
        $user = "select * from users  where user_id= '$user_id' AND posts='yes'";
        $run_user = mysqli_query($con, $user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['user_name'];
        $user_image = $row['user_image'];


        /* DISPLAY POSTS */
        echo "
<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' id = '$post_id'>
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'avatar pull-left'><a href = 'user_profile.php?user_id=$user_id'><img class='img-circle' src='./user/user_images/$user_image' ></a></div>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'>$user_name</div></h5></div><div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>$post_date</span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>by </span>
<span class = 'qa-message-who-data'><a href='user_profile.php?user_id=$user_id'>$user_name </a>on $post_titile</span>
</span>
</div>
</div>
</div>
</div>
<div style='width:auto;overflow-wrap: break-word; ' class='panel panel-default'>
    <div class='panel-body text-justify'>$content</div>
  </div>

        <button class='form-control btn-success' style='width: 200px'>
                                        <a href='single.php?post_id=$post_id'>See reply or Reply to this
                                        </a>
                                        
                                </button>
                               
</div>
</div> 
	";
    }
    include 'functions/pagination.php';
}

//function for search results
function get_results() {
    global $con;


/* @var $_GET type */
    if (isset($_GET['search'])){
      $search_term = $_GET['user_query'];
    }
    /* @var $topic_id type */
    $get_posts = "select * from posts where post_titile like '%$search_term%' OR '$search_term%' OR '%$search_term'   ORDER by 1 DESC ";
    /* it fatch posts form db and put it on page per page there wil be five posts from starting page */
    $run_posts = mysqli_query($con, $get_posts);
    
        $count_results= mysqli_num_rows($run_posts);
        if($count_results==0){
            
             echo "<h2>sorry... No results found for this keyword $search_term </h2>";
        }

    while ($row_posts = mysqli_fetch_array($run_posts)) {
        $user_id = $row_posts['user_id'];
        $post_id = $row_posts['post_id'];
        $post_date = $row_posts['post_date'];
        $content = $row_posts['post_content'];
        $post_titile = $row_posts['post_titile'];



        /* getting user info form db who posts on time line */
        $user = "select * from users  where user_id= '$user_id' AND posts='yes'";
        $run_user = mysqli_query($con, $user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['user_name'];
        $user_image = $row['user_image'];


        /* DISPLAY POSTS */
        echo "
<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' id = '$post_id'>
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'avatar pull-left'><a href = 'user_profile.php?user_id=$user_id'><img class='img-circle' src='./user/user_images/$user_image' ></a></div>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'>$user_name</div></h5></div><div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>$post_date</span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>by </span>
<span class = 'qa-message-who-data'><a href='user_profile.php?user_id=$user_id'>$user_name </a>on $post_titile</span>
</span>
</div>
</div>
</div>
</div>

<div style='width:auto;overflow-wrap: break-word; ' class='panel panel-default'>
    <div class='panel-body text-justify'>$content</div>
  </div>
         <a href='single.php?post_id=$post_id'><button class='form-control btn-success' style='width: 200px'>
                                       See reply or Reply to this
                                </button>        </a>
                                        
                                
                               
</div>
</div> 
	";
    }
    
}


/* function for user posts */

function user_posts() {
    global $con;

   // $per_page = 5; /* per page contain 5 posts */
   // if (isset($_GET['page'])) {
    //    $page = $_GET['page']; /* get page data into page variable */
    //} else {
     //   $page = 1; /* by default there will be single page shown */
    //}
    //$start_from = ($page - 1) * $per_page;
    
    
    if(isset($_GET['u_id'])){
        /* @var $u_id type */
        $u_id =$_GET['u_id'];
    }
    
    $get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC ";//LIMIT $start_from,$per_page
    /* it fatch posts form db and put it on page per page there wil be five posts from starting page */
    $run_posts = mysqli_query($con, $get_posts);
       $count_msg = mysqli_num_rows($run_posts);
                                        if($count_msg==0)
                                        {
                                            echo "<h3><center>Empty...<center><h3>";
                                            exit;
                                        }

    while ($row_posts = mysqli_fetch_array($run_posts)) {
        $user_id = $row_posts['user_id'];
        $post_id = $row_posts['post_id'];
        $post_date = $row_posts['post_date'];
        $content = $row_posts['post_content'];
        $post_titile = $row_posts['post_titile'];



        /* getting user info form db who posts on time line */
        $user = "select * from users  where user_id= '$user_id' AND posts='yes'";
        $run_user = mysqli_query($con, $user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['user_name'];
        $user_image = $row['user_image'];


        /* DISPLAY POSTS */
        echo "
<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' id = '$post_id'>
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'avatar pull-left'><a href = 'user_profile.php?user_id=$user_id'><img class='img-circle' src='./user/user_images/$user_image' ></a></div>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'>$user_name</div></h5></div><div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>$post_date</span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>by </span>
<span class = 'qa-message-who-data'><a href='user_profile.php?user_id=$user_id'>$user_name </a>on $post_titile</span>
</span>
</div>
</div>
</div>
</div>

<div style='width:auto;overflow-wrap: break-word; ' class='panel panel-default'>
    <div class='panel-body text-justify'>$content</div>
  </div>


<div class='form-inline'>
        <a href='edit_post.php?post_id=$post_id'>
            <button class='form-control btn-success' style='width: 70px'>
                                        Edit
            </button>
        </a>
        <a href='functions/delete_post.php?post_id=$post_id'>                         
            <button class='form-control btn-success' style='width: 70px'>
                                        Delete
            </button>
        </a>    
                                        
        <a href='single.php?post_id=$post_id'>    
            <button class='form-control btn-success' style='width: 70px'>
                                        View
            </button>                            
        </a>                          
</div>                               
</div>
</div> 
	";
        
        include 'delete_post.php';
        
    }
    
}


//function for see user profile
function user_profile() {
global $con;
    if (isset($_GET['u_id'])) {
        
    $user_id=$_GET['u_id'];
    $select = "select * from users  where user_id= '$user_id'";
    $run = mysqli_query($con, $select);
    $row = mysqli_fetch_array($run);

    $id = $row['user_id'];
    $name = $row['user_name'];
    $pass = $row['user_pass'];
    $email = $row['user_email'];
    $country = $row['user_country'];
    $gender = $row['user_gender'];
    $image = $row['user_image'];
    $register_date = $row['register_date'];
    $last_login = $row['last_login'];
   
      if($gender=='Male'||$gender=='male'){
          $msg='send him a message';
      } else{
          $msg='send her a message';
      }
      echo "
<div id='card'>
    <img src='user/user_images/$image' class='img-circle'alt='John' style='width:260px;height:260px'>
  <div id='container'>
  <div class = 'profile-usermenu' >
                                        <ul class='nav' >
                                            <li >
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-user'></i>
                                                    <b>Name :</b>  $name</a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-envelope'></i>
                                                    <b>Email:</b>  $email</a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-user'></i>
                                                    <b>Gender:</b>  $gender</a>
                                            </li>
                                            <li>
                                                <a href = '#' >
                                                    <i class = 'glyphicon glyphicon-flag'></i>
                                                    <b>country :</b>  $country</a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-time'></i>
                                                    <b>Member_since :</b>  $register_date</a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-time'></i>
                                                    <b>Last_login :</b>  $last_login</a>
                                            </li>
                                        </ul>
                                    </div>    

    <div style='margin: 24px 0;'>
      <a id='a'href='#'><i class='fa fa-dribbble'></i></a> 
      <a id='a'href='#'><i class='fa fa-twitter'></i></a>  
      <a id='a'href='#'><i class='fa fa-linkedin'></i></a>  
      <a id='a'href='#'><i class='fa fa-facebook'></i></a> 
   </div>
   <a href='messages.php?u_id=$id'><button class='form-control btn-success btn-block'type='submit' >$msg</button></a>
  </div>
</div>

";
    }
    elseif (isset($_GET['user_id'])) {
        $user_id=$_GET['user_id'];
        $select = "select * from users  where user_id= '$user_id'";
    $run = mysqli_query($con, $select);
    $row = mysqli_fetch_array($run);

    $id = $row['user_id'];
    $name = $row['user_name'];
    $pass = $row['user_pass'];
    $email = $row['user_email'];
    $country = $row['user_country'];
    $gender = $row['user_gender'];
    $image = $row['user_image'];
    $register_date = $row['register_date'];
    $last_login = $row['last_login'];
   
      if($gender=='Male'||$gender=='male'){
          $msg='send him a message';
      } else{
          $msg='send her a message';
      }
      echo "
<div id='card'>
    <img src='user/user_images/$image' class='img-circle'alt='John' style='width:230px;height:230px'>
  <div id='container'>
<div class = 'profile-usermenu' >
                                        <ul class='nav' >
                                            <li >
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-user'></i>
                                                    <b>Name :</b>  $name</a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-envelope'></i>
                                                    <b>Email:</b>  $email</a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-user'></i>
                                                    <b>Gender:</b>  $gender</a>
                                            </li>
                                            <li>
                                                <a href = '#' >
                                                    <i class = 'glyphicon glyphicon-flag'></i>
                                                    <b>country :</b>  $country</a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-time'></i>
                                                    <b>Member_since :</b>  $register_date</a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-time'></i>
                                                    <b>Last_login :</b>  $last_login</a>
                                            </li>
                                        </ul>
                                    </div>    

   <p><a href='messages.php?user_id=$id'><button id='button' type='submit'>$msg</button></a></p>
  </div>
</div>

";
    
     
    }
    new_members();
}


function new_members(){
    
    global $con;
    //select new members
        $user = "select * from users LIMIT 0,20";
        $run_user = mysqli_query($con, $user);
        
        echo '<h1>New Members Of This Site...</h1>';
        while ($row = mysqli_fetch_array($run_user)){
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_image = $row['user_image'];

        echo "<span><a href='user_profile.php?u_id=$user_id' data-toggle='tooltip ' title='$user_name'>
                            <div class='profile-userpic' '>
                                   "
                                . "     <P>"
                                        . "<img src='./user/user_images/$user_image' class='img-responsive'  style=' width: 15% ; height: 15%;  alt=''>
                                        </p>
                                        </div>
                                    </a> <h3>$user_name</h3>"
                . "</span>";
}
}