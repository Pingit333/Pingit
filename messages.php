<?php
include './template/home/home_header.php';
?>

<!-- post section on timeline-->
                        <div class="col-lg-6">
    <?php
     if (isset($_GET['u_id'])) {
        
    $u_id=$_GET['u_id'];
    
    $select = "select * from users  where user_id= '$u_id'";
    $run = mysqli_query($con, $select);
    $row = mysqli_fetch_array($run);

    $user_name = $row['user_name'];
    $user_image = $row['user_image'];
    $register_date = $row['register_date']; 
     }
   ?>
 <h2><center> Send message to <?PHP echo $user_name; ?></center></h2> 
<form method="post" action="messages.php?u_id=<?PHP echo $u_id;?>" class="form-group" style="float: right">
   <div class="form-group">
    <a href = 'user_profile.php?u_id=<?PHP echo $u_id; ?>'><img class='img-circle' src='./user/user_images/<?PHP echo $user_image; ?>'style=' width: 30% ; height: 30%;'alt=" <?PHP echo $user_name; ?>" ></a>
   </div>
         <div class="form-group">
             <input class="form-control" name="msg_title" size="50" style=' width: 500px;'placeholder="Message Subject..." required/>
                                </div>
          <div class='form-group'>
                                <textarea class='form-control' name='msg' placeholder='Message content...' 
                                          style='height:200px; width: 500px; text-align: justify' required></textarea>
                            </div>
                            <div class='form-group'>
                                <button type='submit'  style=' width: 500px;'class='form-control btn-success'  name='message' >Send your message...</button>
                            </div>                       
 </form>
                
 </div>  
                        
     <?php
   if(isset($_POST['message'])) {
        
    $msg_title = $_POST['msg_title'];
    $msg = $_POST['msg'];

    $insert_msg="insert into messages(sender,receiver,msg_sub,msg_content,reply,status,msg_date)"
            . "values"
            . "('$user_id','$u_id','$msg_title','$msg','no_reply','unread',NOW())";
     $run_insert = mysqli_query($con, $insert_msg);
     
     if($run_insert){
        echo"Your message is sent to $user_name";
     }
        else{
         echo "Your message is not sent to $user_name";
        }                         }
                        ?>    
                        <!-- post section on timeline end-->

                        <section>
                        <!--user details-->
                        <h2>Member...</h2>
                        <div  id="udatils" class="col-lg-3"style='height:500px; overflow-y: scroll' >
                            
 <?php member();?>                        </div>
                        <!--user details end-->
                        </section>
                    </div>
                    <!--row end-->
                    
                </div>
                <!--container end-->

            </section>
            <!-- user timeline end-->

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Scrolling Nav JavaScript -->
            <script src="js/jquery.easing.min.js"></script>
            <script src="js/scrolling-nav.js"></script>

        </body>
</html>