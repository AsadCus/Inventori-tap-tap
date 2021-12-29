<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link CSS sendiri -->
    <link rel="stylesheet" href="style.css">

    <!-- Link Icon -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <title>Pegawai</title>
</head>
<body>

    <div class="sidebar">

        <!-- Brand -->
        <div class="sidebar-brand">
            <h2>
                <div class="brand">
                    <i class="lab la-wolf-pack-battalion"></i>
                    <div class="brand-name">Nugas</div>
                </div>
                <i class="las la-bars" id="btn"></i>
            </h2>
        </div>

        <!-- Menu -->

        <ul class="nav_list">
            <li>
                <a href="home.php" class="menu">
                    <i class="las la-home"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li class="dua">
                <a id="btn1" class="menu">
                    <i class="las la-users"></i>
                    <span class="links_name">Master</span>
                </a>
                <ul>
                    <li>
                        <a href="pegawai.php">
                            <i class="las la-users"></i>
                            Pegawai
                        </a>
                    </li>
                    <li>
                        <a href="pengguna.php">
                            <i class="las la-user"></i>
                            Pengguna
                        </a>
                    </li>
                    <li>
                        <a href="barang.php">
                            <i class="las la-laptop"></i>
                            Barang
                        </a>
                    </li>
                </ul>
                <span class="tooltip">Master</span>
            </li>
            <li class="tiga">
                <a href="inventori.php" class="menu">
                    <i class="las la-box"></i>
                    <span class="links_name">Inventori</span>
                </a>
                <span class="tooltip">Inventori</span>
            </li>
            <li class="empat">
                <a href="peminjaman.php"  class="menu">
                    <i class="las la-receipt"></i>
                    <span class="links_name">Peminjaman</span>
                </a>
                <span class="tooltip">Peminjaman</span>
            </li>
            <li class="bawah">
                <a class="menu" id="btn2">
                    <i class="at">@</i>
                    <span class="links_name">Happy^2</span>
                </a>
                <span class="tooltip">Copyright</span>
            </li>
        </ul>
    </div>

    <div class="main-content">

        <header>
            <div class="header-title">
                <h2>
                    <label for="">
                        Bukan Master
                    </label>
                </h2>
            </div>
            <div class="user-wrapper">
                <img src="gambar/poto.png" alt="">
                <div>
                    <h4>Admin</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>

        <main>
            <!-- Tabel Pegawai -->
            <div class="table-grid">

                <div class="pinjams">
                    <div class="card">
                        <div class="card-header">
                            <h3>Tabel Pegawai</h3>

                            <button id="tambah">Tambah</button>
                        </div>

                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Id Pegawai</td>
                                        <td>Nama Pegawai</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql    = "SELECT * FROM pegawai";
                                        $query  = mysqli_query($connect,$sql);
                                        while($pgw = mysqli_fetch_array($query)){
                                            echo "<tr>";
                                            echo "<td class='td-start'>".$pgw['id_pegawai']."</td>";
                                            echo "<td>".$pgw['nama_pegawai']."</td>";
                                            echo "<td class='td-end'>";
                                            echo "<a href='formpegawai.php?id_pegawai=".$pgw['id_pegawai']."' type='button' class='button button-secondary'>Ubah</a> | ";
                                            echo "<a href='hapus.php?id_pegawai=".$pgw['id_pegawai']."' type='button' class='button button-danger'>Hapus</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="penggunas">
                    <div class="card">
                        <div class="card-header">
                            <h3>Pengguna</h3>
                            <a href="pengguna.php" class="button-main">Lihat <span class="las la-arrow-right"></span></a>
                        </div>

                        <div class="card-body scrollpengguna">
                            <?php
                            $sql    = "SELECT * FROM pengguna";
                            $query  = mysqli_query($connect,$sql);

                            while($pgna = mysqli_fetch_array($query)){
                                echo "<div class='pengguna'>";
                                echo "<div class='info'>";
                                echo "<img src='uploads/".$pgna['no_pengguna'].".".$pgna['fileActualExt']."' class='wow'>";
                                echo "<div>";
                                echo "<h4>".$pgna['nama_pengguna']."</h4>";
                                echo "<small>".$pgna['kategori']."</small>";
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='icon'>";
                                echo "<span class='las la-user-circle'></span>";
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="modalcontainer" class="modalcontainer">
        <div class="modal">
            <form action="simpan.php" method="POST">
                <div class="form_group">
                    <input class="form_field" type="text" name="id_pegawai">
                    <label class="form_label">Id Pegawai</label>
                </div>
                <div class="form_group">
                    <input class="form_field" type="text" name="nama_pegawai">
                    <label class="form_label">Nama Pegawai</label>
                </div>
                <input class="submit" type="submit" name="simpan_pegawai" value="Tambah">
            </form>
        </div>
    </div>
    <script src="nyam.js"></script>
</body>
</html>