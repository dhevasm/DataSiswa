<?php 
    require "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa | Admin</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js" defer></script>
</head>
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
                    <img src="assets/pp.png" alt="photoprofil..." class="icon pp big">
                    <h3>Dheva</h3>
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
                    <li class=""><a href="">Table</a></li>
                    <li class=""><a href="">Chart</a></li>
                    <li><a href="">Tambah Siswa</a></li>
                </ul>
            </div>
        </div>
        <!-- sidebar end -->

        <!-- navbar start -->
        <div class="navbar">
            <div class="hamburger">
                <img src="assets/menu.png" alt="=" class="icon">
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
                        <p id="jumlahlaki"><b>12</b></p>
                    </div>
                </div>
                <div class="card" style="background-color:#3D8CBC;">
                    <div class="img" style="background-color: #317297;">
                        <img src="assets/male-and-female.png" alt="" class="big">
                    </div>
                    <div class="text">
                        <p>TOTAL SISWA</p>
                        <p id="jumlahsiswa"><b>12</b></p>
                    </div>
                </div>
                <div class="card" style="background-color: #00A55B;">
                    <div class="img" style="background-color: #008549;">
                        <img src="assets/female.png" alt="" class="big">
                    </div>
                    <div class="text">
                        <p>SISWA PEREMPUAN</p>
                        <p id="jumlahperem"><b>12</b></p>
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
                                    <select name="number" id="number"></select>
                                    <h3>entries</h3>
                                </div>
                            </div>
                            <div class="header-right">
                                <div class="header-right-top">
                                    <button>Tambah Siswa</button>
                                </div>
                                <div class="header-right-bottom">
                                    <input type="search" id="srch" name="srch" placeholder="Search...">
                                    <button>OO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- section end -->

        <!-- footer start -->
        <div class="footer"></div>
        <!-- footer end -->
    </div>
</body>
</html>