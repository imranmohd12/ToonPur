    
<?php
    $conn = mysqli_connect("localhost","root","","toonpur");
    $srch_value = $_GET['txt_value'];
    $search_query = "select * from movies where name LIKE '%".$srch_value."%'";
    $rslt = mysqli_query($conn,$search_query);
?>
   
    <?php
    while($row = mysqli_fetch_array($rslt)){
    ?>
        <div class="movie-temp">
            <div class="poster" >
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" />';?>
            </div>
            <div class="movie-title">
                <h3><?php echo $row['name'];?> (<?php echo $row['year'];?>)</h3>
            </div>
            <div class="playbutton">
                <a href="playmovie.php?movie_name=<?php echo $row['name'];?>" class="play-btn">Play</a> 
            </div>
        </div>
    <?php
    }
?>