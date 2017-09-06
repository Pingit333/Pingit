<?php
include './template/home/home_header.php';
?>                        <!-- post section on timeline-->
                        <section>
                            <div class=" col-lg-5"  >
                                <div class="form-group" style="padding-top: 30px">
                                     <h2>Message Reading...</h2>
                                    <?php
                                    if (isset($_GET['msg_id'])) {
                                        
                                        $get_id = $_GET['msg_id'];
                                     
                                     
                                        $sel_message = "select * from messages where msg_id='$get_id'";
                                        $run_message = mysqli_query($con, $sel_message);
                                        
                                        $row_message = mysqli_fetch_array($run_message);
                                        $sender_id = $row_message['sender'];
                                        $receiver_id = $row_message['receiver'];
                                        $msg_subject = $row_message['msg_sub'];
                                        $msg_con = $row_message['msg_content'];
                                        $message_date = $row_message['msg_date'];
                                     
                                        $get_receiver = "select * from users where user_id='$receiver_id'";
                                        $run_receiver = mysqli_query($con, $get_receiver);
                                        $row_receiver = mysqli_fetch_array($run_receiver);
                                        $receiver_name = $row_receiver['user_name'];
                                        echo "            
<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' >
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'><b>To :</b>$receiver_name</div></h5>
</div>
<div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>At $message_date </span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>On</span>
<span class = 'qa-message-who-data'> $msg_subject</span>
</span>
</div>
</div>
</div>
</div>
  
<div style=' width:auto; overflow-wrap: break-word; ' class='panel panel-default'>
    <div class='panel-body text-justify'>$msg_con</div>
 </div>
 

<div class='form-group'>    
    <a href='functions/sent_message_delete.php?msg_id=$get_id'>                         
            <button class='form-control btn-success' name=''style='width: 200px'>
                                        Delete
            </button>
    </div>
</div>
</div>
";
                                    }

                                    if (isset($_POST['msg_reply'])) {

                                        $user_reply = $_POST['reply'];

                                        if ($run_update) {
                                            echo '<h2>message replied...</h2>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>  
                        </section>
                        <!-- post section on timeline end-->

                        <!--user details-->
                        <div  id="user datils" class="col-lg-4" id="sentbox" >
                            <h2>Sent messages...</h2>
                                    <!-- SIDEBAR MENU2 -->
                                    <div  style='height:500px; overflow-y: scroll'>
                                        <?php
                                         
                                        $sel_msg = "select * from messages where sender='$user_id'  order by 1 DESC";
                                        $run_msg = mysqli_query($con, $sel_msg);
                                        
                                        
                                        
                                        $count_msg = mysqli_num_rows($run_msg);
                                        
                                        if($count_msg==0)
                                        {
                                            echo "<h3><center>Empty...<center><h3>";
                                            exit;
                                        }
                                        while ($row_msg = mysqli_fetch_array($run_msg)) {

                                            $msg_id = $row_msg['msg_id'];
                                            $msg_sender = $row_msg['sender'];
                                            $msg_receiver = $row_msg['receiver'];
                                            $msg_sub = $row_msg['msg_sub'];
                                            $msg_content = $row_msg['msg_content'];
                                            $msg_date = $row_msg['msg_date'];
                                            $status = $row_msg['status'];


                                            $get_receiver = "select * from users where user_id='$msg_receiver'";
                                            $run_receiver = mysqli_query($con, $get_receiver);
                                            $row = mysqli_fetch_array($run_receiver);

                                            $receiver_name = $row['user_name'];
                                           
                                            echo "            

<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' style='width:auto; >
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'><b>To :</b>$receiver_name</div></h5></div><div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>At $msg_date</span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>On</span>

    
    <div style='width:auto; overflow-wrap: break-word; text-align-left ' class='panel-body text-justify'>
    <a href='my_messages.php?msg_id=$msg_id;'>$msg_sub</a>
        </div>
 

</span>
</div>
</div>
</div>
</div>
<a href='sent.php?msg_id=$msg_id'><button type='submit' class=' form-control btn-success'>Read..</button></a>
</div>
</div> 
";
                                        }
                                        ?>                  
                                        <!-- END MENU2 -->
                                    </div>
                        </div>
                        <!--user details end-->
                    </div>
                    <!--row end-->

                </div>
                <!--container end-->

            </section>
            <!-- user timeline end-->

       <?php
include './template/home/home_footer.php';


