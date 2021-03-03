<!Doctype html>
<html>
<head>
    <title>Toonpur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Changa+One&display=swap" rel="stylesheet"> 
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="script.js" type="text/javascript"></script>
    <link rel="icon" href="tp.png" type="image/gif" sizes="16x16">
</head>
<body>
    <div class="header" id="header">
        <a href="index.php" class="logo title-text"><b>tooNPur</b></a>
        <div class="header-right">
            <a href="index.php" class="active">Home</a>
            <a href="admin.php" class="active">admin</a>
            <a href="#footer" class="active">Contact</a>
        </div>
    </div> 
    <div class="searcher">
        <div class="search-container">
        <form action="" method="get">
            <input type="text" class="search-feild" id="search-field"  onkeyup="search(this.value)" placeholder="Search Movie">
        </form>
        <div class="searchlist" id="searchlist">
            
        </div>
        </div>
        <button class="play-btn btn" onclick="searchbtn()">Search</button>
    </div>
    <center>
    <div class="player" id="player">
    <?php
    //$movie_name = '';
    $conn=mysqli_connect("localhost","root","","toonpur");
    $movie_name = $_GET['movie_name'];
   
    $sql_query = "select * from movies where name='$movie_name'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_row($result);
     ?>
    <iframe src="<?php echo $row[5]?>" class="player-window" allowfullscreen="allowfullscreen">
    </iframe>
    <div class="movie-info">
        <h3>
            <?php echo $row[1];?> (<?php echo $row[4];?>)
        </h3>    
    </div>
    <div class="note">
        <h3>*Note:</h3>
        <p>If you are using this website on your mobile <b>"double tap"</b> on player window for full screen.In fullscreen controls will work fine.You can also watch this movie on your Gdrive App.You need to click on <b>"Popout"</b> which is in upper right corner in player window.Gdrive doesn't have quality controls Best to watch in browser. </p>
    </div>
    
    </div>
        <h2 id="search_result">
            
        </h2>
        <?php
        if(isset($_GET['page_num'])){
        $page = $_GET['page_num'];
        }
        else{
            $page = 1;
        }
        $num_per_page = 12;
        $start = ($page-1)*12;
        $query = "select * from movies where name != '$movie_name' ORDER BY year DESC limit $start,$num_per_page ";
        $result = mysqli_query($conn,$query);
        ?>
        <div class="main-sec"  id="found">
        <?php
        while($row=mysqli_fetch_array($result)){
        ?>
        <div class="movie-temp">
            <div class="poster" >
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" />';?>
            </div>
            <div class="movie-title">
                <h3><?php echo $row['name'];?> (<?php echo $row['year'];?>)</h3>
            </div>
            <div class="playbutton">
                <!--button value="<php echo $row['name'];?>" onclick="playmovie(this.value)" class="play-btn" href="#header">Play</button-->
                <a href="playmovie.php?movie_name=<?php echo $row['name'];?>" class="play-btn">Play</a>
                
            </div>
        </div>
       <?php     
        }?>
        
        </div>
        <div class="page-num" id="page-num">
        <?php
            $cnt_query = "select * from movies";
            $cnt_exe = mysqli_query($conn,$cnt_query);
            $total_rec = mysqli_num_rows($cnt_exe);
            
            $total_pages = ceil($total_rec/$num_per_page);
            if($page>1){
            ?>
            <a href="playmovie.php?page_num=<?php echo $page-1;?>&movie_name=<?php echo $movie_name?>" class="page-btn">&lt;</a>
            <?php
            }?>
            <p class="present_page">Page <?php echo $page;?></p>
            <?php
            if($page != $total_pages){
            ?>
            <a href="playmovie.php?page_num=<?php echo $page+1;?>&movie_name=<?php echo $movie_name?>" class="page-btn">&gt;</a>
            <?php
            }
            ?>
        </div>
    </center>
     <div class="footer" id="footer">
        <center>
        <h3>Contact us</h3>
        
        <table>
            <tr>
            <td style="text-align:right;">Email</td>
            <td>: toonpurr@gmail.com</td>
            </tr>
            <td>Telegram channel</td>
            <td>: Animated Movie Zone</td>
            <tr>
            
            </tr>
        </table>
        </center>
    </div>
</body>
</html>



    

    
    
    
