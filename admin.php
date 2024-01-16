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
            <div class="header">
                <h2 id="head-pos">Dashboard</h2>
                <p>Menu > Dashboard</p>
            </div>
        </div>
        <!-- section end -->

        <!-- footer start -->
        <div class="footer"></div>
        <!-- footer end -->
    </div>
</body>
</html>