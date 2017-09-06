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
                                        $msg_subject = $row_message['msg_sub'];
                                        $msg_con = $row_message['msg_content'];
                                        $message_date = $row_message['msg_date'];
                                        $reply_content=$row_message['reply'];
                                     
                                        $get_sender = "select * from users where user_id='$sender_id'";
                                        $run = mysqli_query($con, $get_sender);
                                        $row = mysqli_fetch_array($run);
                                        $sender_name = $row['user_name'];
                                        
                                        //update status from unread to read
                                            $update_unread = "update messages set status='read' where msg_id='$get_id' ";
                                            $run_unread = mysqli_query($con, $update_unread);
                                        echo "            
<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item'  >
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'><b>From :</b>$sender_name</div></h5>
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

    <div style=' width:auto; overflow-wrap: break-word; 'class='panel-body text-justify'><b>My reply : </b>$reply_content</div>
 
 <form action=''method='post' class='form-group'>
    <div class='form-group'>    
        <textarea class='form-control' name='reply' placeholder='Type a reply here...'required></textarea>
    </div>
    <div class='form-group'>    
        <button type='submit'class='form-control btn-success' name='msg_reply' style='width: 100px'>
             Reply...                          
        </button>
    </div>
            
</form>
<div class='form-group'>    
    <a href='functions/delete_inbox_msg.php?msg_id=$get_id'>                         
            <button class='form-control btn-success' name=''style='width: 100px'>
                                        Delete
            </button>
    </div>
</div>
</div>
";                                 }

                                    if (isset($_POST['msg_reply'])) {

                                        $user_reply = $_POST['reply'];
                                        
                                        if($reply_content!='no_reply')
                                        {
                                            echo"<div style=' width:auto; overflow-wrap: break-word;' class='panel-body text-justify'>"
                                            . "<h3> this message was already replied</h3>"
                                                    . "</div>";
                                            
                                                    exit();
                                        }
                                        else{
                                        $update_msg = "update messages set reply= '$user_reply' where msg_id='$get_id'";
                                        $run_update = mysqli_query($con, $update_msg);
                                        echo"<div style=' width:auto; overflow-wrap: break-word;' class='panel-body text-justify'>"
                                            . "<h3> you replied successfully...</h3>"
                                                    . "</div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>  
                        </section>
                        <!-- post section on timeline end-->

                        <!--user details-->
                        <div  id="user datils" class="col-lg-4" id="inbox" >
                            <h2>Inbox...</h2>
                                    <!-- SIDEBAR MENU2 -->
                                    <div  style='height:500px; overflow-y: scroll'>
                                        <?php
                                        $sel_msg = "select * from messages where receiver='$user_id'  order by 1 DESC";
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
 

                                            $get_sender = "select * from users where user_id='$msg_sender'";
                                            $run = mysqli_query($con, $get_sender);
                                            $row = mysqli_fetch_array($run);

                                            $sender_name = $row['user_name'];
                                            
                                           
                                            echo "            

<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' style='width:auto; ;'>
<div class = 'message-inner'>
<div class = 'message-head clearfix'>
<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'><b>From :</b>$sender_name</div></h5></div><div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>At $msg_date</span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>On</span>

    
    <div style='width:auto; overflow-wrap: break-word; text-align-left ' class='panel-body text-justify'><a href='my_messages.php?msg_id=$msg_id;'>$msg_sub</a></div>
 

</span>
</div>
</div>
</div>
</div>
<a name='read' href='my_messages.php?msg_id=$msg_id'><button type='submit'class='form-control btn-success' >Read..</button></a>
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
?>