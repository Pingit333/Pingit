<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con = mysqli_connect("localhost","root","","pingit")or die("connection was not established");
if(isset($_GET['msg_id'])){
    
    $msg_id=$_GET['msg_id'];
    
    $delete_inbox_msg="delete from messages where msg_id='$msg_id'";
    $run_delete_inbox_msg= mysqli_query($con, $delete_inbox_msg);
    
    if($run_delete_inbox_msg){
        
        echo "<script>alert(' Msg has deleted !');</script>";
         echo "<script>window.open('../home.php','_self')</script>";

    }
}

