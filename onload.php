
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
        
        $query = "select * from movies limit $start,$num_per_page";
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
                <a href="playmovie.php?movie-name=<?php echo $row['name'];?>">play</a> 
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
         <a href="#header"><button value='<?php echo $page-1;?>' class='page-btn' onclick='page(this.value)'>Prev..</button></a>
            <?php
            }
            
            for($i=1;$i<=$total_pages;$i++){
            ?>
                <a href="#header"><button value='<?php echo $i;?>' class='page-btn' onclick='page(this.value)'><?php echo $i;?></button></a>
            <?php
            }
            if($page != $total_pages){
            ?>
         <a href="#header"><button value='<?php echo $page+1?>' class='page-btn' onclick='page(this.value)'>Next</button></a>
            <?php
            }
            ?>
        </div>