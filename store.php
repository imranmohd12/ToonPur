<?php
    $conn = mysqli_connect("localhost","root","","toonpur");
    $name = $_GET['name'];
    $target = "/".basename[$_FILES['image']['name']]
    //$photo = addslashes(file_get_contents($FILES['photo']['temp']));
    $photo = $_FILES['photo']['id'];
    $year = $_GET['year'];
    $link =  $_GET['link'];
    echo $name;
    echo $photo;
    echo $year;
    echo $link;
    $sql = "insert into movies(name,photo,year,link) values($name,$photo,$year,$year)";
    if(mysqli_query($conn,$sql)){
        echo "Successfully stored!";
    }
    else{
        echo "failed";
    }
?>