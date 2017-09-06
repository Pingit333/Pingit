<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $get_id = $_GET['post_id'];
        $get_com= "select * from comments  where post_id='$get_id' ORDER by 1 DESC";
        /* it fatch posts form db and put it on page per page there wil be five posts from starting page */
        $run_com = mysqli_query($con, $get_com);
        
        while($run= mysqli_fetch_array($run_com)){
        
            $com = $run['comment'];
            $comment_name=$run['comment_author'];
            $date=$run['date'];
            $user_com_id=$run['user_id'];
            
             echo "
                 <div class='col-lg-10'>                             
<section>
<div class = 'qa-message-list' id = 'wallmessages'>
<div class = 'message-item' id = '$post_id'>
<div class = 'message-inner'>
<div class = 'message-head clearfix'>

<div class = 'user-detail'>
<h5 class = 'handle'><div style='float:left'>$comment_name</div></h5></div><div class = 'user-detail'>
<div class = 'post-meta'>
<div class = 'asker-meta'>
<span class = 'qa-message-what'></span>
<span class = 'qa-message-when'>
<span class = 'qa-message-when-data'>$date</span>
</span>
<span class = 'qa-message-who'>
<span class = 'qa-message-who-pad'>by </span>
<span class = 'qa-message-who-data'>$comment_name on $post_titile</span>
</span>
</div>
</div>
</div>
</div>

  <div style='width:auto;overflow-wrap: break-word; ' class='panel panel-default'>
    <div class='panel-body text-justify'>$com</div>
  </div>

</div>
</div>

</section> </div>";
        }