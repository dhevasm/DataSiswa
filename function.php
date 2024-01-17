<?php 
    $connect = mysqli_connect("Localhost", "root", "", "db_datasiswa");

    function upload($data){
        global $connect;
        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars(stripslashes($data["nama"]));
        $tgllahir = htmlspecialchars($data["tgllahir"]);
        $gender = htmlspecialchars($data["gender"]);
        $alamat = htmlspecialchars($data["alamat"]);

        mysqli_query($connect, "INSERT INTO tb_siswa VALUES('$nis', '$nama', '$tgllahir', '$gender', '$alamat')");
        header("Location:admin.php");
    }

    function edit($data){
        global $connect;
        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars(stripslashes($data["nama"]));
        $tgllahir = htmlspecialchars($data["tgllahir"]);
        $gender = htmlspecialchars($data["gender"]);
        $alamat = htmlspecialchars($data["alamat"]);

        mysqli_query($connect, "UPDATE tb_siswa SET nis = '$nis', nama = '$nama', 
        tgllahir = '$tgllahir', gender = '$gender', alamat = '$alamat' 
        WHERE nis = '$nis'");
        header("Location:admin.php");
    }
?>