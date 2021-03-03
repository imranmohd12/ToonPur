<?php
    $conn = mysqli_connect("localhost","root","","toonpur");
    $fnd = $_GET['fnd'];
    $found_query = "select * from movies where name = '$fnd'";
    $result = mysqli_query($conn,$found_query);
    $row = mysqli_fetch_row($result);
    
?>
<div class="movie-temp">
    <div class="poster">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row[2] ).'" />';?>
    </div>
    <div class="movie-title">
        <h3><?php echo $row[1];?> (<?php echo $row[4];?>)</h3>
    </div>
    <div class="playbutton">
        <button value="<?php echo $row[1];?>" onclick="playmovie(this.value)" class="play-btn">Play</button>
    </div>
</div>