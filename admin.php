<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <style>
        .container {
            position: relative;
            height: 720px;
            background-color: #90AFCS;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr; 
            justify-items: center;
            align-items: center
            }
        
            .admin_tab{
            top: 50px;  
           text-align: center;
            background-color: #336B87;
            border-radius: 5px;
            padding: 30px;
            -webkit-box-shadow: 0 15px 156px -10px #777;
            -moz-box-shadow: 0 15px 15px -10px #777;
            box-shadow: 0 15px 15px -10px #777;
            
            }
        tr,th{
            padding: 20px;
            font-size: 30px;
        }
        tr{
            padding: 20px;
        }
        th{
            background-color: #2A3132;
            color: white;
            
            border-radius: 5px;
        }
        input[type="text"],input[type="password"]{
            height: 30px;
            width: 200px;
            border-radius: 5px;
            
        }
        button{
            border: 0px;
            font-size: 20px;
            background-color: deepskyblue;
            color: white;
            border-radius: 4px;
            padding: 5px;
        }
        .home{
           
            text-decoration: none;
            font-size:25px;
            padding: 10px;
            margin-top: 10px;
            background-color: deepskyblue;
            color: white;
            border-radius: 5px;
            margin: 20px;
        }
    </style>
</head>
<body>
    <a href="index.php" class="home">Back to Home</a>
    <div class="container">
    <div class="item1">
        
        </div>
        <div class="item2">    
        <table class="admin_tab">
        <tr>
            <th>Admin</th>
        </tr>
        <tr>
            <td><input type="text" id="username" placeholder="Usename"></td>
        </tr>
        <tr>
            <td><input type="password" id="password" placeholder="Password"></td>
        </tr>
        <tr>
            <td><button id="" class="">Login</button><td>
        </tr>
    </table>
        </div>
        <div class="item3">
        </div>                
    </div>  
</body>
</html>