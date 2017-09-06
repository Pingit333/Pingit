<?php

/*  
 * delete user data query or the php code
 */

 include '../includes/connection.php';
if(isset($_GET['delete'])){
    $get_id=$_GET['delete'];
             $delete_user = "delete from users where user_id='$get_id'";
             $run_delete_user = mysqli_query($con, $delete_user);
             
             $delete_posts = "delete from posts where user_id='$user_id'";
             $run_delete_posts = mysqli_query($con, $delete_posts);
             
           
             echo "<script>window.open('index.php','_self')</script>";

}  