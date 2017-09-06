<div class='well'>
    <h2><center> View_Posts...</center></h2>
    <!-- table for the view user-->
    <table class='table table-hover '>
        <tr class='active' style="">
            <td><b>S.N.</b></td>
            <td><b>Title</b></td>
            <td><b>Topic</b></td>
            <td><B>Author</B></td>
            <td><B>Date</B></td>
            <td><B>Delete</B></td>
            <td><B>Edit</B></td>
        </tr> 
        <?php
        include '../includes/connection.php';

        $get_posts = "select * from posts order by 1 DESC";
        $run_posts = mysqli_query($con, $get_posts);
        $i = 0;
        while ($row_posts = mysqli_fetch_array($run_posts)) {

            $user_id = $row_posts['user_id'];
            $post_id = $row_posts['post_id'];
            $post_titile = $row_posts['post_titile'];
            $post_date = $row_posts['post_date'];
            $topic_new_id=$row_posts['topic_id'];
            $i++;
          
          
            $sel_user = "select * from users where user_id='$user_id' ";
            $run_user = mysqli_query($con, $sel_user);
            while ($row_user = mysqli_fetch_array($run_user)) {
                $user_name = $row_user['user_name'];

                
            $sel_title = "select * from topics where topic_id='$topic_new_id'";
            $run_title = mysqli_query($con, $sel_title);
            while ($row_title = mysqli_fetch_array($run_title)) {
                $topic_titile = $row_title['topic_titile'];
               
        
        ?>
                <tr>
                    <td><?PHP echo $i; ?></td>
                    <td><?PHP echo $post_titile; ?></td>
                    <td><?PHP echo $topic_titile; ?></td>
                    <td><?PHP echo $user_name; ?></td>
                    <td><?PHP echo $post_date; ?></td>
                    <td><a class="btn-danger form-control"href="index.php?view_posts&delete=<?php echo $post_id; ?>"><center>Delete</center></a></td>
                    <td><a class="btn-primary form-control" href="index.php?view_posts&edit_post=<?php echo $post_id; ?>"><center>Edit</center></a></td>
                </tr> 
            <?PHP }}} ?>  
    </table> 

    <?PHP
    include '../includes/connection.php';
    
    if (isset($_GET['edit_post'])) {
        $edit_id = $_GET['edit_post'];
        $get_posts = "select * from posts where post_id='$edit_id'";
        $run_posts = mysqli_query($con, $get_posts);
        $row_posts = mysqli_fetch_array($run_posts);
        
        $post_new_id = $row_posts['post_id'];
        $post_titile = $row_posts['post_titile'];
        $post_content = $row_posts['post_content'];
        $topic_new_id=$row_posts['topic_id'];
        
        
        
            $sel_title = "select * from topics where topic_id='$topic_new_id'";
            $run_title = mysqli_query($con, $sel_title);
             while ($row_title = mysqli_fetch_array($run_title)) {

                $topic_titile = $row_title['topic_titile'];
                
            
        ?>
        <!-- post section on timeline-->               
        <br><br><br><br><br>
        <!-- post section on timeline-->
        <div class="col-lg-10">
            <div class="form-group"> 
                <h2  >
                    Edit your posts... 
                </h2>

                <form method="post" class="form-group"  >

                    <div class="form-group">
                        <input class="form-control" name="title" value="<?php echo $post_titile ;?>" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="content"
                                  style="height: 200px; text-align: justify" ><?php echo $post_content;?></textarea>
                    </div>
                    <div class="form-group form-inline">
                        <center> 
                            <div class="form-group">
                                <select class="form-control" name="topic" style="width: auto">
                                    <option  selected="selected" ><?php echo $topic_titile; ?> </option>
                                    <?php gets_topic(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn-success" style="width: auto" name="update">Update posts</button>
                            </div>
                        </center>
                    </div>
                </form>
            </div>
        </div>
        <!-- post section on timeline end-->                        
             <?php }} ?>   
        
    <?php
    include '../includes/connection.php';
    if (isset($_POST['update'])) {
        $topic= $_POST['topic'];
        $content = $_POST['content'];
        $titile = $_POST['title'];
      
    
        $update_post = "update posts set post_titile='$titile',post_content='$content',topic_id='$topic',post_date=NOW() where post_id='$post_new_id'";
        $run_update_post = mysqli_query($con, $update_post);

        if ($run_update_post) {

            echo "<script>alerts('your post successfully updated...')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    
    
    if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
             $delete_post = "delete from posts where post_id='$delete_id'";
             $run_delete_post = mysqli_query($con, $delete_post);
             
             echo "<script>window.open('index.php','_self')</script>";

}
    
    