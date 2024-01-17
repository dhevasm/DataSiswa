<?php 
    require "function.php";

    $query = mysqli_query($connect, "SELECT * FROM tb_siswa");
    $querymale = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE gender Like 'Laki-laki'");
    $queryfemale = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE gender Like 'Perempuan'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa | Admin</title>
</head>
<style>
    <?php include "css/main.css" ?>
</style>
<body> 
    <div class="fcontainer">
        <!-- sidebar start -->
        <div class="sidebar">
            <div class="brand">
                <h1>Data</h1>
                <h1 style="font-weight: lighter;">Siswa</h1>
            </div>
            <div class="profile side">
                <div class="photo-profile">
                    <img src="assets/pp.png" alt="photoprofil..." class="icon pp big" id="side-account-img">
                    <div style="display: flex; flex-direction: column;">
                        <h3 class="side-account-name"><div>Dheva</div><div style="font-size: 12px; font-weight: lighter;">🟢 Online</div></h3>
                    </div>
                </div>
            </div>
            <div class="side-search">
                <input type="search" name="res" id="res" placeholder="Search...">
            </div>
            <div class="side-menu">
                <div class="menu">
                    <p>Menu</p>
                </div>
                <ul>
                    <li class=""><img src="assets/dashboard-512.png" alt="db" class="sideicon"><a href="" class="sidetext">Dashboard</a></li>
                    <li class=""><img src="assets/pie-chart-512.png" alt="ch" class="sideicon"><a href="" class="sidetext">Chart</a></li>
                    <li class="openinput hoverpointer"><img src="assets/plus-512.png" alt="+" class="sideicon"><a href="" class="sidetext">Tambah Siswa</a></li>
                </ul>
            </div>
        </div>
        <!-- sidebar end -->

        <!-- navbar start -->
        <div class="navbar">
            <div class="hamburger">
                <img src="assets/menu.png" alt="=" class="icon" id="hamburgerbutton">
                </style>
            </div>
            <div class="profile">
                <div class="photo-profile">
                    <img src="assets/pp.png" alt="photoprofil..." class="icon pp">
                    <h3>Dheva</h3>
                </div>
                <div class="settings">
                    <img src="assets/settings.png" alt="set..." class="icon">
                </div>
            </div>
        </div>
        <!-- navbar end -->

        <!-- section start -->
        <div class="section">
            <div class="section-1">
                <h2 id="head-pos">Dashboard</h2>
                <p>Menu > Dashboard</p>
            </div>
            <div class="section-2">
                <div class="card">
                    <div class="img">
                        <img src="assets/male.png" alt="" class="big">
                    </div>
                    <div class="text">
                        <p>SISWA LAKI-LAKI</p>
                        <p id="jumlahlaki"><b><?= mysqli_num_rows($querymale) ?></b></p>
                    </div>
                </div>
                <div class="card" style="background-color:#3D8CBC;">
                    <div class="img" style="background-color: #317297;">
                        <img src="assets/male-and-female.png" alt="" class="big">
                    </div>
                    <div class="text">
                        <p>TOTAL SISWA</p>
                        <p id="jumlahsiswa"><b><?= mysqli_num_rows($query)  ?></b></p>
                    </div>
                </div>
                <div class="card" style="background-color: #00A55B;">
                    <div class="img" style="background-color: #008549;">
                        <img src="assets/female.png" alt="" class="big">
                    </div>
                    <div class="text">
                        <p>SISWA PEREMPUAN</p>
                        <p id="jumlahperem"><b><?= mysqli_num_rows($queryfemale) ?></b></p>
                    </div>
                </div>
            </div>
                <div class="section-3">
                    <div class="bg-table">
                        <div class="header">
                            <div class="header-left">
                                <div class="header-left-top">
                                    <img src="assets/mortarboard.png" alt="" class="big">
                                    <h1>TABEL SISWA</h1>
                                </div>
                                <div class="header-left-bottom">
                                    <h3>Show</h3>
                                    <select name="number" id="number" style="margin-right: 10px;"></select>
                                    <h3>entries</h3>
                                </div>
                            </div>
                            <div class="header-right">
                                <div class="header-right-top">
                                    <button class="openinput">Tambah Siswa</button>
                                </div>
                                <div class="header-right-bottom">
                                    <input type="search" id="srch" name="srch" placeholder="Search...">
                                    <button><img src="assets/search-13-512.png" alt="OO" class="small"></button>
                                </div>
                            </div>
                        </div>

                        <!-- table start -->
                        <div class="table">

                            <table border="1px solid #9999" style="border-collapse: collapse;"> 
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                                <?php 
                                    while($row = mysqli_fetch_assoc($query)){
                                        ?>
                                        <tr>
                                            <td><?= $row["nis"]  ?></td>
                                            <td><?= $row["nama"]  ?></td>
                                            <td><?= $row["tgllahir"]  ?></td>
                                            <td><?= $row["gender"]  ?></td>
                                            <td><?= $row["alamat"]  ?></td>
                                            <td>
                                                <div style="display: flex; justify-content: space-evenly;">
                                                    <a href="update.php?nis=<?= $row['nis']; ?>" class="data-update"><img src="assets/pencil-512.png" alt="change" class="small"></a>
                                                    <a href="delete.php?nis=<?= $row['nis']; ?>" class="data-delete"><img src="assets/x-mark-512.png" alt="X" class="small"></a></td>
                                                </div>
                                        </tr>
                                        <?php
                                    }
    
                                ?>
                            </table>
                        </div>
                        <!-- table end -->
                    </div>
                    </div>
                </div>
        </div>
        <!-- section end -->

        <!-- tambah data start -->
        <div class="tambah-data">
            <div style="margin-bottom: 20px; display: flex; justify-content: space-between;">
                <h2>Tambah Data Siswa</h2>
                <h2 id="closeinput" class="hoverpointer">X</h2>
            </div>
            <form method="post" action="" class="tambah-data-input">
                <div>
                    <label for="nis">NIS:</label>
                    <input type="text" name="nis" id="nis" inputmode="numeric" autofocus required>
                </div>
                <div>
                    <label for="nama">Name:</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div>
                    <label for="tgllahir">Tanggal lahir:</label>
                    <input type="date" name="tgllahir" id="tgllahir" required>
                </div>
                <div style="align-self: start; display: flex; gap: 10px; margin-left: 23%;">
                    <p>Jenis Kelamin:</p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                    <div style="display: flex; gap: 10px;">
                        <input type="radio" name="gender" id="laki" value="Laki-laki" class="genderinput"><label for="laki">Laki - laki</label>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <input type="radio" name="gender" id="perempuan" value="Perempuan" class="genderinput"><label for="perempuan">Perempuan</label>
                    </div>
                    </div>
                </div>
                <div>
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" required>
                </div>
                <button name="simpan" id="simpan">Simpan</button>
            </form>
            <?php 
                if(isset($_POST["simpan"])){
                    upload($_POST);
                }
            ?>

        </div>
        <!-- tambah data end -->

        <!-- footer start -->
        <div class="footer"></div>
        <!-- footer end -->
    </div>

    <script>
        <?php include "js/main.js" ?>
    </script>
</body>
</html>