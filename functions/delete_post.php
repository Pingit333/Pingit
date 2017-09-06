<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con = mysqli_connect("localhost","root","","pingit")or die("connection was not established");
if(isset($_GET['post_id'])){
    
    $post_id=$_GET['post_id'];
    
    $delete_post="delete from posts where post_id='$post_id'";
    $run_delete= mysqli_query($con, $delete_post);
    
    if($run_delete){
        
        echo "<script>alert('A post has been deleted!');</script>";
         echo "<script>window.open('../home.php','_self')</script>";

    }
}

