<?php 
    require "function.php";

    $rowperpage = 10;

    $query = mysqli_query($connect, "SELECT * FROM tb_siswa Orders LIMIT $rowperpage OFFSET 0");
    $querytotal = mysqli_query($connect, "SELECT * FROM tb_siswa");
    $querymale = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE gender Like 'Laki-laki'");
    $queryfemale = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE gender Like 'Perempuan'");

    $keywordsvalue = "";

    $totalpage = mysqli_num_rows($querytotal);
    $pageactive = $totalpage / $rowperpage;
    $page;
    
    if(isset($_GET["page"])){
        $pg = $_GET["page"];
        $_SESSION["page"] = $pg;
        if($pg > 1){
            $pgoffset = ($pg - 1) * $rowperpage;
            $query = mysqli_query($connect, "SELECT * FROM tb_siswa Orders LIMIT $rowperpage OFFSET $pgoffset");
        }
    }

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
                    <li class="hoverpointer" id="dashboardbutton"><img src="assets/dashboard-512.png" alt="db" class="sideicon"><a href="" class="sidetext">Dashboard</a></li>
                    <li class="hoverpointer" id="chartbutton"><img src="assets/pie-chart-512.png" alt="ch" class="sideicon"><a href="" class="sidetext">Chart</a></li>
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
                <div class="photo-profile" onclick="ppcard.classList.toggle('displaynone')">
                    <img src="assets/pp.png" alt="photoprofil..." class="icon pp">
                    <h3>Dheva</h3>
                </div>
                <div class="settings">
                    <img src="assets/settings.png" alt="set..." class="icon">
                </div>
            </div>
            <div class="profile-card displaynone">
                <img src="assets/pp.png" alt="" class="icon pp big">
                <h3>Account</h3>
                <button onclick="window.location.href = 'index.php'">Sign Out</button>
            </div>
            <script>
                const ppcard = document.querySelector(".profile-card");
            </script>
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
                        <p id="jumlahlaki"><b id="jumlahsiswalaki" class="<?= mysqli_num_rows($querymale) ?>"><?= mysqli_num_rows($querymale) ?></b></p>
                    </div>
                </div>
                <div class="card" style="background-color:#3D8CBC;">
                    <div class="img" style="background-color: #317297;">
                        <img src="assets/male-and-female.png" alt="" class="big">
                    </div>
                    <div class="text">
                        <p>TOTAL SISWA</p>
                        <p id="jumlahsiswa"><b><?= mysqli_num_rows($querytotal)  ?></b></p>
                    </div>
                </div>
                <div class="card" style="background-color: #00A55B;">
                    <div class="img" style="background-color: #008549;">
                        <img src="assets/female.png" alt="" class="big">
                    </div>
                    <div class="text">
                        <p>SISWA PEREMPUAN</p>
                        <p id="jumlahperem"><b id="jumlahsiswaperempuan" class="<?= mysqli_num_rows($queryfemale) ?>"><?= mysqli_num_rows($queryfemale) ?></b></p>
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
                                        <select name="rowperpage" id="number" style="margin-right: 10px;">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    <h3>entries</h3>
                                </div>
                            </div>
                            <div class="header-right">
                                <div class="header-right-top">
                                    <button class="openinput">Tambah Siswa</button>
                                </div>
                                <div class="header-right-bottom">
                                    <form action="" method="post">
                                        <input type="search" id="srch" name="srch" placeholder="Search..." value="<?= $keywordsvalue ?>">
                                        <button name="buttonsearch"><img src="assets/search-13-512.png" alt="OO" class="small"></button>
                                    </form>
                                    <?php 
                                        if(isset($_POST["buttonsearch"])){
                                            $keywords = htmlspecialchars($_POST["srch"]);
                                            
                                            $keywordsvalue = $keywords;

                                            $query = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE 
                                            nis LIKE '%$keywords%' OR
                                            nama LIKE '%$keywords%' OR
                                            alamat LIKE '%$keywords%'");
                                        }
                                    ?>
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
                            <!-- table end -->
                        </div>
                        <div class="pagination">
                    <?php 
                        
                        
                        if(isset($_GET["page"])){
                            $page = $_GET["page"];
                        }else{
                            $page = 1;
                        }

                        if($page < 1){}
                        ?>
                            <a href="admin.php?page=<?php echo $page - 1; ?>">
                            <?php 
                                if($page > 1){
                                    echo "<";
                               }
                            ?>
                        </a>
                        <?php

                        for($i = 0; $i < $pageactive; $i ++){
                            ?>
                            <a href="admin.php?page=<?= $i + 1 ?>"><?= $i + 1; ?></a>
                            <?php
                        }
                        ?>
                            <a href="admin.php?page=<?php echo $page + 1; ?>">
                            <?php 
                            if($page <= $pageactive){
                                 echo ">";
                            }
                            
                            ?>
                        </a>
                        <?php
                    ?>
                </div>    
                    </div>
                    </div>
                </div>

                
        </div>
        <!-- section end -->

        <!-- chart start -->
        <div class="chart">
            <div class="section-1-chart">
                <h2 id="head-pos">Chart</h2>
                <p>Menu > Chart</p>
            </div>
            <div class="section-2-chart">
                <div class="pie diagram">
                    <div>
                    <canvas id="myChart"></canvas>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <script>
                    const ctx = document.getElementById('myChart');
                    let jumlahlaki = document.querySelector("#jumlahsiswalaki").classList;
                    let jumlahpermepuan = document.querySelector("#jumlahsiswaperempuan").classList;

                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                        labels: ['Laki-laki', 'Perempuan'],
                        datasets: [{
                            label: 'Jumlah Siswa',
                            data: [jumlahlaki, jumlahpermepuan],
                            borderWidth: 1
                        }]
                        },
                        options: {
                        scales: {
                           
                        }
                        }
                    });
                    </script>
                </div>
                
                <div class="long diagram">
                    <script>
                        let siswa2004;
                        let siswa2005;
                        let siswa2006;
                        let siswa2007;
                        let siswa2008;
                    </script>

                    <!-- data tgllahir siswa start -->
                    <?php 
                        $ts04 = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE YEAR(tgllahir) = '2004'");
                        $ts05 = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE YEAR(tgllahir) = '2005'");
                        $ts06 = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE YEAR(tgllahir) = '2006'");
                        $ts07 = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE YEAR(tgllahir) = '2007'");
                        $ts08 = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE YEAR(tgllahir) = '2008'");
                        $jts04 = mysqli_num_rows($ts04);
                        $jts05 = mysqli_num_rows($ts05);
                        $jts06 = mysqli_num_rows($ts06);
                        $jts07 = mysqli_num_rows($ts07);
                        $jts08 = mysqli_num_rows($ts08);
                        echo "<script>
                            siswa2004 = $jts04;
                            siswa2005 = $jts05;
                            siswa2006 = $jts06;
                            siswa2007 = $jts07;
                            siswa2008 = $jts08;
                        </script>";
                        
                    ?>
                    <!-- data tgllahir siswa end -->

                    <div><canvas id="myChartBar"></canvas></div>

                    <script>
                        const ctxb = document.getElementById("myChartBar");
                        new Chart(ctxb, {
                            type: 'bar',
                            data: {
                            labels: ['2004','2005', '2006', '2007', '2008'],
                            datasets: [{
                                label: 'Jumlah Siswa',
                                data: [siswa2004, siswa2005, siswa2006, siswa2007, siswa2008],
                                borderWidth: 1
                            }]
                            },
                            options: {
                            scales: {
                                y: {
                                beginAtZero: true
                                }
                            }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- chart end   -->


        <!-- tambah data start -->
        <div class="tambah-data">
            <div style="margin-bottom: 20px; display: flex; justify-content: space-between;">
                <h2>Tambah Data Siswa</h2>
                <h2 id="closeinput" class="hoverpointer">X</h2>
            </div>
            <form method="post" action="admin.php" class="tambah-data-input">
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
                    echo "<script>
                    window.location.href = 'admin.php';
                    </script>";
                }
            ?>

        </div>
        <!-- tambah data end -->

        <!-- footer start -->
        <div class="footer">
            <p style="margin: 30px;">
            <b>Copyright © 2024 </b><a href="">Ardiansyah Dheva</a>. 
            All right reserved.</p>
        </div>
        <!-- footer end -->
    </div>

    <script>
        <?php include "js/main.js" ?>
    </script>
</body>
</html>