<?php


    /* for user timelinesection detail fatching */
    $user = $_SESSION['user_email'];
    $get_user = "select * from users  where user_email= '$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);

    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_pass = $row['user_pass'];
    $user_email = $row['user_email'];
    $user_country = $row['user_country'];
    $user_gender = $row['user_gender'];
    $user_image = $row['user_image'];
    $register_date = $row['register_date'];
    $last_login = $row['last_login'];
    
    $user_post = "select * from posts  where user_id= '$user_id'";
    $run_posts = mysqli_query($con, $user_post);
    $postscount= mysqli_num_rows($run_posts);
?>
   <div id='myModal' class='modal fade'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title'>Details</h4>
                </div>
                <div class='modal-body'>
                    <div class = 'profile-usermenu' >
                        <ul class='nav'>  
                            <li>
                            <center><img src='user/user_images/<?php echo $user_image ; ?>' class='img-responsive img-circle' style=' width: 30% ; height: 30%; '></center>
                            <li>
                                            <li >
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-user'></i>
                                                    <b>Name :</b>  <?php echo $user_name; ?> </a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-user'></i>
                                                    <b>Gender:</b>  <?php echo $user_gender; ?></a>
                                            </li>
                                            <li>
                                                <a href = '#' >
                                                    <i class = 'glyphicon glyphicon-flag'></i>
                                                    <b>country :</b> <?php echo $user_country; ?> </a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-time'></i>
                                                    <b>Member_since :</b>  <?php echo $register_date; ?> </a>
                                            </li>
                                            <li>
                                                <a href = '#'>
                                                    <i class = 'glyphicon glyphicon-time'></i>
                                                    <b>Last_login :</b>  <?php echo $last_login; ?> </a>
                                            </li>
                                        </ul>
                                        </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                   
                </div>
            </div>
        </div>
    </div>
   


