<div class='well'>
    <h2><center> View_Topics...</center></h2>
    <!-- table for the view user-->
    <table class='table table-hover '>
        <tr class='active' style="">
            <td><b>S.N.</b></td>
            <td><b>Topic_id</b></td>
            <td><b>Topic_Title</b></td>
            <td><b>Delete</b></td>
 </tr> 
        <?php
        include '../includes/connection.php';

        $get_topics = "select * from topics order by 1 DESC";
        $run_topics = mysqli_query($con, $get_topics);
        $i = 0;
        while ($row_topics = mysqli_fetch_array($run_topics)) {

            $topic_id = $row_topics['topic_id'];
            $topic_titile = $row_topics['topic_titile'];
            $i++;
        ?>
                <tr>
                    <td><?PHP echo $i; ?></td>
                    <td><?PHP echo $topic_id; ?></td>
                    <td><?PHP echo $topic_titile; ?></td>
                     <td><a class="btn-danger form-control"href="index.php?view_topics&delete=<?php echo $topic_id; ?>"><center>Delete</center></a></td>
                </tr> 
            <?PHP } ?>  
    </table> 
    
    <!-- post section on timeline-->               
        <br><br><br><br><br>
        <h2  >
                    Add topic... 
                </h2>
        
                <form method="post" class="form-group"  >

                    <div class="form-group">
                        <input class="form-control" name="topic_titile" placeholder="enter a new topic " />
                    </div>
                    <button type="submit" class="btn-success form-control" name="add"><center>Add</center></button>
</form>
     <?php
        include '../includes/connection.php';
        
        if(isset($_POST['add']))
        {
            $topic_titile=$_POST['topic_titile'];
            $get_topics = "insert into  topics (topic_titile)values('$topic_titile')";
            $run_topics = mysqli_query($con, $get_topics);
              if ($run_topics) {

            echo "<script>alerts('your  successfully added a topic...')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        }

         if(isset($_GET['delete'])){
            $delete_id=$_GET['delete'];
             $delete_topic = "delete from topics where topic_id='$delete_id'";
             $run_delete_topic = mysqli_query($con, $delete_topic);
             
             echo "<script>window.open('index.php','_self')</script>";
         }
     