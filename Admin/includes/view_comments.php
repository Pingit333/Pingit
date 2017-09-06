<div class='well'>
    <h2><center> View_Comments...</center></h2>
    <!-- table for the view user-->
    <table class='table table-hover '>
        <tr class='active' style="">
            <td><b>S.N.</b></td>
            <td><b>Comment_Author</b></td>
            <td><b>Comment<b></td>
            <td><B>Date</B></td>
            <td><B>Delete</B></td>
            <td><B>Edit</B></td>
        </tr> 
        <?php
        include '../includes/connection.php';

        $get_comments = "select * from comments order by 1 DESC";
        $run_comments = mysqli_query($con, $get_comments);
        $i = 0;
        while ($row_comments = mysqli_fetch_array($run_comments)) {

            $user_id = $row_comments['user_id'];
            $comment_id = $row_comments['comment_id'];
            $comment_content=$row_comments['comment'];
            $comment_date = $row_comments['date'];
            $i++;
          
          
            $sel_user = "select * from users where user_id='$user_id' ";
            $run_user = mysqli_query($con, $sel_user);
            while ($row_user = mysqli_fetch_array($run_user)) {
                $user_name = $row_user['user_name'];             
        
        ?>
                <tr>
                    <td><?PHP echo $i; ?></td>
                    <td><?PHP echo $user_name; ?></td>
                    <td><?PHP echo $comment_content; ?></td>
                    <td><?PHP echo $comment_date; ?></td>
                    <td><a class="btn-danger form-control"href="index.php?view_comments&delete=<?php echo $comment_id; ?>"><center>Delete</center></a></td>
                    <td><a class="btn-primary form-control" href="index.php?view_comments&edit_comment=<?php echo $comment_id; ?>"><center>Edit</center></a></td>
                </tr> 
            <?PHP }} ?>  
    </table> 

    <?PHP
    include '../includes/connection.php';
    
    if (isset($_GET['edit_comment'])) {
        $comment_id = $_GET['edit_comment'];
        $get_comments = "select * from comments where comment_id='$comment_id'";
        $run_comments = mysqli_query($con, $get_comments);
        $row_comments = mysqli_fetch_array($run_comments);
        
        $comment_new_id = $row_comments['comment_id'];
        
        $comment_content = $row_comments['comment'];
                   
        ?>
        <!-- post section on timeline-->               
        <br><br><br><br><br>
        <!-- post section on timeline-->
        <div class="col-lg-10">
            <div class="form-group"> 
                <h2  >
                    Edit your comment... 
                </h2>

                <form method="post" class="form-group"  >
                     <div class="form-group">
                        <textarea class="form-control" name="content"
                                  style="height: 200px; text-align: justify" ><?php echo $comment_content;?></textarea>
                    </div>
                    <div class="form-group form-inline">
                            <div class="form-group">
                                <button type="submit" class="form-control btn-success" style="width: auto" name="cupdate">Update comments</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
<?php    } ?>
        <!-- post section on timeline end-->                               
    <?php
    include '../includes/connection.php';
    if (isset($_POST['cupdate'])) {
        
        $comment_content = $_POST['content'];
        
      
    
        $update_comment = "update comments set comment='$comment_content',date=NOW() where comment_id='$comment_new_id'";
        $run_update_comment = mysqli_query($con, $update_comment);

        if ($run_update_comment) {

            echo "<script>alerts('your comment successfully updated...')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    
    
    if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
             $delete_comment = "delete from comments where comment_id='$delete_id'";
             $run_delete_comment = mysqli_query($con, $delete_comment);
             
             echo "<script>window.open('index.php','_self')</script>";

}
?>
</div>