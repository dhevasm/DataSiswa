<?php 
    require "function.php";

    $nis = $_GET["nis"];

    if(isset($_POST["yes"])){
        mysqli_query($connect, "DELETE FROM tb_siswa WHERE nis = '$nis'");
        header("Location:admin.php");
    }
    if(isset($_POST["no"])){
        header("Location:admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa | Delete</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }
    body{
        display: flex;
        width: 100%;
        height: 100vh;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    button{
        padding: 20px;
        border: none;
        outline: none;
        border-radius: 10px;
        transition: 0.3s;
        color: #fff;
        font-size: 20px;
        font-weight: bolder;
    }
    button:hover{
        opacity: 50%;
        transition: 0.3s;
        cursor: pointer;
    }
</style>
<body>
    <h1>Yakin ingin menghapus data <?= $nis ?>?</h1>
    <div>
        <form action="" method="post">
            <button name="yes" style="background-color: #349976;">Yes</button>
            <button name="no" style="background-color: #DD4B38;">No</button>
        </form>
    </div>
</body>
</html>