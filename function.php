<?php 
    $connect = mysqli_connect("Localhost", "root", "", "db_datasiswa");

    session_start();
    $page = 1;
    if(isset($_SESSION["page"])){
        $page = $_SESSION["page"];
    }

    function upload($data){
        global $connect;
        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars(stripslashes($data["nama"]));
        $tgllahir = htmlspecialchars($data["tgllahir"]);
        $gender = htmlspecialchars($data["gender"]);
        $alamat = htmlspecialchars($data["alamat"]);

        mysqli_query($connect, "INSERT INTO tb_siswa VALUES('$nis', '$nama', '$tgllahir', '$gender', '$alamat')");
    }

    function edit($data){
        global $connect;
        global $page;
        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars(stripslashes($data["nama"]));
        $tgllahir = htmlspecialchars($data["tgllahir"]);
        $gender = htmlspecialchars($data["gender"]);
        $alamat = htmlspecialchars($data["alamat"]);

        mysqli_query($connect, "UPDATE tb_siswa SET nis = '$nis', nama = '$nama', 
        tgllahir = '$tgllahir', gender = '$gender', alamat = '$alamat' 
        WHERE nis = '$nis'");
    }
?>