window.addEventListener("load",function(){
   const loader = document.querySelector(".loader");
    loader.className += " hidden";
    
});

function page(num){
                var rem = document.getElementById("page-num");
                rem.parentNode.removeChild(rem);
                //document.getElementById("page-num").innerHTML='';
                var page_num = num;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET","onload.php?page_num="+page_num,false);
                xmlhttp.send(null);
                document.getElementById("found").innerHTML = xmlhttp.responseText;
            }
function playmovie(movie_name){
    var name = movie_name;
    document.getElementById("backtext").innerHTML=" &lt; &lt; Bact to home";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","playmovie.php?movie-name="+name,false);
    xmlhttp.send(null);
    document.getElementById("player").innerHTML = xmlhttp.responseText;
    window.location="#player";
    //document.getElementById("watchtoo").innerHTML="<h3>You can watch these too...</h3>";
    document.getElementById("found").innerHTML="";
    document.getElementById("page-num").innerHTML="";
}
function search(temp_name){
    var tmp = temp_name;
    if(tmp != ""){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","searcher.php?srch="+tmp,false);
    xmlhttp.send(null);
    document.getElementById("searchlist").innerHTML = xmlhttp.responseText;
    }
    else{
    document.getElementById("searchlist").innerHTML = "";
    }
    
}
function found(a){
    var fnd = a;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","found.php?fnd="+fnd,false);
    xmlhttp.send(null);
    document.getElementById("search-field").value = "";
    document.getElementById("found").innerHTML = xmlhttp.responseText;
    document.getElementById("searchlist").innerHTML = "";
    document.getElementById("page-num").innerHTML = "";
    
    
}

function searchbtn(){
    var txt_value = document.getElementById("search-field").value;
    if(txt_value != ''){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","searchbtn.php?txt_value="+txt_value,false);
    xmlhttp.send(null);
    document.getElementById("search-field").value = "";
    document.getElementById("found").innerHTML = xmlhttp.responseText;
    document.getElementById("searchlist").innerHTML = "";
    document.getElementById("page-num").innerHTML = "";
    document.getElementById("search_result").innerHTML="Search Result...";
    window.location="#search_result";
    }
    else
    {
        alert("Please Enter Movie Name.");
    }
}

