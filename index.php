<?php 
    $connect = mysqli_connect("localhost", "root", "", "db_datasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa | Log in</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .container{
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 30px;
        background-color: #d3d6df;
    }
    .card{
        display: flex;
        flex-direction: column;
        gap: 20px;
        background-color: white;
        width: 420px;
        height: 200px;
        padding: 20px 0;
        align-items: center;
        justify-content: start;
        position: relative;
    }
    .card input{
        width: 300px;
        height: 20px;
        padding: 10px;
        font-size: 15px;
    }
    .card button{
        outline: none;
        border: none;
        background-color: #3e8cbb;
        font-weight: bold;
        font-size: 17px;
        padding: 5px 10px;
        color: white;
        position: absolute;
        right: 0;
        bottom: 0;
        margin: 20px 50px;
        transition: 0.3s;
    }
    .card button:hover{
        cursor: pointer;
        opacity: 80%;
        transition: 0.3s;
    }
    .card p{
        position: absolute;
        left: 0;
        bottom: 0;
        margin: 20px 50px;
    }
    
</style>
<body>
    <div class="container">
    <h1>Admin</h1>
        <form action="" method="post" class="card" style="margin-bottom: 100px;">
            <label for="login">Sign in to start your session</label>
            <input type="text" name="username" id="login" placeholder="Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button name="submit">Sign in</button>

            <?php 
                if(isset($_POST["submit"])){
                    $username = $_POST["username"];
                    $password = $_POST["password"];
            
                    $dataquery = mysqli_query($connect, "SELECT * FROM account WHERE username = '$username' ");
                    $datafetch = mysqli_fetch_assoc($dataquery);
            
                    if(mysqli_num_rows($dataquery) === 1){
                        if($password == $datafetch['password']){
                            echo "<p style='color:green;'>berhasil log in</p>";
                            header("Location:user-login.php");
                        }else{
                            echo "<p style='color:red;'>username atau password salah</p>";
                        }
                    }else{
                        echo "<p style='color:red;'>username atau password salah</p>";
                    }
                    
                }
            ?>
        </form>
    </div>
</body>
</html>