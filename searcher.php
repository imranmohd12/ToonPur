<?php
    $conn = mysqli_connect("localhost","root","","toonpur");
    $srch = $_GET['srch'];
    echo $srch;
    $search_query = "select * from movies where name LIKE '%".$srch."%'";
    $rslt = mysqli_query($conn,$search_query);
    $output ='<ul class="list">';
    while($row = mysqli_fetch_array($rslt)){
        $output .= "<li id='".$row['name']."' class='dropitem'><a href='playmovie.php?movie_name=".$row['name']."'>".$row['name']." (".$row['year'].")</a></li>";
    }
    $output .= "</ul>";
    echo $output;
    ?>

     <!--onclick='found(this.id)'-->