<?php
include './includes/connection.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* @var $_POST type */
if (isset($_POST["sign_up"])) {
        
        
        $name = mysqli_real_escape_string($con,$_POST['u_name']);
        
        $pass =mysqli_real_escape_string($con,$_POST['u_pass']) ;
        $email = mysqli_real_escape_string($con,$_POST['u_email']);
        $gender =mysqli_real_escape_string($con,$_POST['u_gender']) ;
        $country =mysqli_real_escape_string($con,$_POST['u_country']) ;
        $b_day =mysqli_real_escape_string($con,$_POST['u_birthday']) ;
        $status = "unverified";
        $posts = "no";
        
        /* @var $get_email type */
        
        $get_email = "select * from users where user_email='$email'";
        /* @var $run_email type */
        $run_email = mysqli_query($con, $get_email);
        $check = mysqli_num_rows($run_email);
        
        if ($check === 1) {
            echo '<script>alert(" Email is already registered.")</script>';
            echo '<script>alert(" Please try another!")</script>';
            exit();
        }
        
        if(strlen($pass)<8){
            echo '<script>alert("password shoulde be minimum 8 characters!");</script>';
            exit();
        }
        else {
            $insert = "insert into users (user_name,user_pass,user_email,user_country,user_gender,user_b_day,user_image,register_date,last_login,status,posts) "
                    . "values ('$name','$pass','$email','$country','$gender','$b_day','default.jpg',NOW(),NOW(),'$status','$posts')";
            $run_insert = mysqli_query($con, $insert);
            
            if($run_insert){
                $_SESSION['user_email']= $email;
            echo '<script>alert(" registration successful...")</script>';
            echo "<script>window.open('home.php','_self')</script>";
         
   
            }
        }
        
    }

