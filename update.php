<?php 
    require "function.php";

    $nis = $_GET["nis"];

    $query = mysqli_query($connect,"SELECT * FROM tb_siswa WHERE nis = '$nis'");
    $data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa | Edit Data</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }
    body{
        background-color: #999;
    }
    .tambah-data{
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -80%);
    width: 650px;
    padding: 25px;
    height: 350px;
    background-color: #fff;
    box-shadow: 3px 3px 3px #999;
    z-index: 9999;
    transition: 1s;
    input{
        width: 300px;
        padding: 10px 20px;
    }
    .genderinput{
        width: 10px;

    }
    form{
        display: flex;
        justify-content: center;
        align-items: end;
        flex-direction: column;
        gap: 10px;
        margin-right: 10%;
        button{
            padding: 10px 20px;
        }
    }
    }
    #closeinput:hover{
        cursor: pointer;
    }
    <?php include "css/mobile.css" ?>
</style>
<body>
<div class="tambah-data">
            <div style="margin-bottom: 20px; display: flex; justify-content: space-between;">
                <h2>Edit Data Siswa <?= $data["nis"]; ?></h2>
                <h2 id="closeinput" class="<?= $page ?>">X</h2>
            </div>
            <form method="post" action="" class="tambah-data-input">
                <div>
                    <label for="nis">NIS:</label>
                    <input type="text" name="nis" id="nis" inputmode="numeric" autofocus required
                    value="<?= $data["nis"]; ?>">
                </div>
                <div>
                    <label for="nama">Name:</label>
                    <input type="text" name="nama" id="nama" required
                    value="<?= $data["nama"]; ?>">
                </div>
                <div>
                    <label for="tgllahir">Tanggal lahir:</label>
                    <input type="date" name="tgllahir" id="tgllahir" required
                    value="<?= $data["tgllahir"]; ?>">
                </div>
                <div style="align-self: start; display: flex; gap: 10px; margin-left: 23%;">
                    <p>Jenis Kelamin:</p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                    <div style="display: flex; gap: 10px;">
                        <input type="radio" name="gender" id="laki" value="Laki-laki" class="genderinput"
                        <?php if($data["gender"] == "Laki-laki"){
                            echo "Checked";
                        } 
                        ?>><label for="laki">Laki - laki</label>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <input type="radio" name="gender" id="perempuan" value="Perempuan" class="genderinput"
                        <?php if($data["gender"] == "Perempuan"){
                            echo "Checked";
                        } 
                        ?>><label for="perempuan">Perempuan</label>
                    </div>
                    </div>
                </div>
                <div>
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" required
                    value="<?= $data["alamat"]; ?>">
                </div>
                <button name="simpan" id="simpan">Simpan</button>
            </form>
            <?php 
                if(isset($_POST["simpan"])){
                    edit($_POST);
                    echo "<script>
                        window.location.href='admin.php?page=$page';
                    </script>";
                }
            ?>
        </div>
        <script>
            const pg = document.querySelector("#closeinput").classList;
            document.querySelector("#closeinput").addEventListener("click", () =>{
                window.location.href = `admin.php?page=${pg}`;
            });
        </script>
</body>
</html>