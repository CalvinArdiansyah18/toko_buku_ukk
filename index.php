<?php
session_start();
include "conf/conn.php";
if (isset($_SESSION['id_kasir']) == 0) {
  echo '<script>alert("Anda Harus Login Terlebih Dahulu !!!");
            window.location.href="pages/login.php"</script>';
} else {
  // Ambil id_kasir dari session
  $id_kasir = $_SESSION['id_kasir'];

  // Query untuk mendapatkan data pengguna
  // Pastikan tabelnya adalah 'users' (sesuaikan dengan nama tabel Anda)
  $query = "SELECT nama, level FROM kasir WHERE id_kasir = '$id_kasir'";  // Periksa nama tabel 'users'

  // Menjalankan query dan memeriksa hasilnya
  $result = mysqli_query($koneksi, $query);

  // Jika query berhasil, ambil data pengguna
  if ($result) {
    $user = mysqli_fetch_assoc($result);  // Ambil data pengguna
    $nama = $user['nama'];  // Ambil nama pengguna dari database
    $level = $user['level'];  // Ambil level pengguna (admin/pegawai)
    $jabatan = ($level == 'admin') ? 'Kepala Toko Buku' : 'Staf Toko Buku'; // Tentukan jabatan berdasarkan level
  } else {
    echo "Error fetching data: " . mysqli_error($conn);
  }
?>

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Admin Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif] -->
  </head>

  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Bu</b>Bu</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Buka Buku</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top skin-purple">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/face.jpeg" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                    <?php echo $nama; ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/face.jpeg" class="img-circle" alt="User Image">

                    <p>
                      <?php
                      echo $jabatan; // Menampilkan jabatan berdasarkan level
                      echo "<small>" . ucfirst($level) . "</small>"; // Menampilkan level (Admin/Pegawai)
                      ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div>
                    </div> -->
                  <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="pages/logout_process.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
            </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/buku.jpeg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Toko Buku</p>
              <a href="#"><i class="fa fa-circle text-success"></i>Buka</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="treeview">
            <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> <span>Beranda</span></a></li>
            </li>

            <!-- Menu untuk level admin -->
            <?php if ($_SESSION['level'] == "admin"): ?>
              <li class="treeview">
                <a href="#">
                  <i class="glyphicon glyphicon-briefcase"></i> <span>Kelola Data</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="index.php?page=data_buku"><i class="glyphicon glyphicon-folder-open"></i> <span>Data
                        Buku</span></a></li>
                  <li><a href="index.php?page=data_distributor"><i class="glyphicon glyphicon-folder-open"></i> <span>Data
                        Distributor</span></a></li>
                  <li><a href="index.php?page=data_pasok"><i class="glyphicon glyphicon-folder-open"></i> <span>Data
                        Pasok</span></a></li>
                  <li><a href="index.php?page=data_kasir"><i class="glyphicon glyphicon-folder-open"></i> <span>Data
                        Kasir</span></a></li>
                  <!-- <li><a href="index.php?page=detail"><i class="glyphicon glyphicon-folder-open"></i> <span>Detail</span></a></li> -->
                  <li><a href="index.php?page=data_penjualan"><i class="glyphicon glyphicon-tags"></i> <span>Data
                        Penjualan</span></a></li>
                </ul>
              </li>
              <li><a href="index.php?page=pemilik"><i class="glyphicon glyphicon-user"></i> <span>Data kerja
                    Pegawai</span></a></li>
            <?php endif; ?>

            <!-- Menu untuk level pegawai -->
            <?php if ($_SESSION['level'] == "pegawai"): ?>
              <li class="treeview">
                <a href="#">
                  <i class="glyphicon glyphicon-briefcase"></i> <span>Kelola Transaksi</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="index.php?page=data_multiitem"><i class="glyphicon glyphicon-shopping-cart"></i>
                      <span>Transaksi Buku</span></a></li>
              </li>
          </ul>
        <?php endif; ?>

        </ul>

        <!-- /.sidebar -->
      </aside>
      <!-- Content --><?php include("conf/page.php"); ?><!-- /Content -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b>
        </div>
        <strong>Toko <a href="https://github.com/CalvinArdiansyah18">Buka Buku</a>.</strong> Temukan Buku Pilihanmu.
      </footer>

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
      <!-- <div class="control-sidebar-bg"></div> -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  </body>

  </html>
<?php } ?>