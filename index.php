<!Doctype html>
<html>
<head>
    <title>Toonpur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">  
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="script.js" type="text/javascript"></script>
    <link rel="icon" href="tp.png" type="image/gif" sizes="16x16">
    <script>
        function enteralert(){
            alert("Sorry for inconvenience,Enter key will not work in search feild please use search button or select movie from laveral dropdown.");
        }
    </script>
</head>
<body>
    <div class="loader">
        <div class="element">
            <h1 href="index.php" class="title-text"><span style="font-family: 'Fredoka One', cursive;">TOON</span>PUR</h1>
        </div>
    </div>
    <div class="header" id="header">
        <a href="index.php" class="logo title-text">tooNPur</a>
        <div class="header-right">
            <a href="index.php" class="active">Home</a>
            <a href="admin.php" class="active">admin</a>
            <a href="#footer" class="active">Contact</a>
        </div>
    </div>
    <div class="searcher">
        <div class="search-container">
        
            <input type="text" class="search-feild" id="search-field"  onkeyup="search(this.value)" placeholder="Search Movie">

        <div class="searchlist" id="searchlist">
            
        </div>
        </div>
        <button class="play-btn btn" id="srchbtn" onclick="searchbtn()">Search</button>
    </div>
   
    <div style="background-image: url('abo.jpg');">
    <div class="enterkey" id="enterkey">
        <button onclick="enterkey()" style="background-color:#6A8347;color:white;float:right;padding:10px;border-radius:3px;border:0px;cursor:pointer;">Close</button>
        <p>Sorry for the inconvenience, In the Search field <b>"Enter"</b> key will not work.You can use search button for search or select the movie from laveral dropdown.</p>
    </div>
    <script>
        function enterkey(){
            document.getElementById("enterkey").style.display="none";
        }    
    </script>
    <!--a href="index.php" id="backtext" class="backtext" style="background-color: dodgerblue;
    color: white;
    border-radius: 3px;
    padding:3px;
    text-decoration: none;padding:10px;margin:10px;"></a-->
    <h2 id="search_result">
            
    </h2>
    <center>
    
    <!--div class="movie-info" style="width:95%;text-align:left;background-color:#206a5d;padding:5px;" id="watchtoo">
    </div-->
    <?php
        $conn = mysqli_connect("localhost","root","","toonpur");
        if(isset($_GET['page_num'])){
        $page = $_GET['page_num'];
        }
        else{
            $page = 1;
        }
        
        $num_per_page = 12;
        $start = ($page-1)*12;
        
        $query = "select * from movies ORDER BY year DESC limit $start,$num_per_page";
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
         <a href="index.php?page_num=<?php echo $page-1;?>&movie_name=<?php echo $movie_name?>" class="page-btn">Prev..</a>
            <?php
            }?>
            <p class="present_page">Page <?php echo $page;?></p>
            <?php
            if($page != $total_pages){
            ?>
            <a href="index.php?page_num=<?php echo $page+1;?>&movie_name=<?php echo $movie_name?>" class="page-btn">Next</a>
            <?php
            }
            ?>
        </div>
     
    </center>
    </div>
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