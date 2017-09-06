<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$query = "select * from posts";
$result= mysqli_query($con, $query);
//count the total records
$total_posts= mysqli_num_rows($result);
//using cell function to divide total records on per page
$total_pages= ceil($total_posts/$per_page);
//going to first page

echo "<div class='row'>
                <div class='col-lg-12'><center><div id='pagination'>"
. "<a href='home.php?page=1'>Frist page - </a>"
        ;

for($i=1;$i<=$total_pages;$i++){
    echo "<a href='home.php?page=$i'> $i -</a>";
}

//going to last page
echo"<a href='home.php?page=$total_pages'> Last_page</a></center></div></div></div>";
