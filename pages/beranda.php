<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <!-- Judul Halaman Sesuai dengan Level -->
      <small>
        <?php
        // Cek level pengguna dan tampilkan judul yang sesuai
        if ($_SESSION['level'] == "admin") {
          echo "Halaman Admin";
        } elseif ($_SESSION['level'] == "pegawai") {
          echo "Halaman Pegawai";
        }
        ?>
      </small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php
    // Menampilkan pesan yang sesuai dengan level pengguna
    if ($_SESSION['level'] == "admin") {
      echo "<h4>Pilih Menu Disamping Untuk Mengelola Data.</h4>";
    } elseif ($_SESSION['level'] == "pegawai") {
      echo "<h4>Anda Sebagai Pegawai Toko BukaBuku.</h4>";
    }
    ?><br>

    <!-- Poster Film Section -->
    <div class="row">
      <?php
      include "conf/conn.php";  // Pastikan koneksi database sudah dibuat
      $query = "SELECT id_buku, judul, stok, gambar FROM buku";
      $result = mysqli_query($koneksi, $query);

      $class_index = 1; // Inisialisasi variabel untuk kelas gambar

      while ($row = mysqli_fetch_assoc($result)) {
        // Tentukan kelas untuk gambar berdasarkan iterasi
        $class = 'class-' . $class_index;
        // Pindahkan ke kelas berikutnya (1, 2, atau 3)
        $class_index = ($class_index % 3) + 1;
      ?>
        <div class="col-md-4 mb-3"> <!-- Menggunakan col-md-4 untuk 3 card dalam satu baris -->
          <div class="card shadow">
            <img src="dist/img/<?php echo $row['gambar']; ?>" class="card-img-top <?php echo $class; ?>"
              alt="<?php echo $row['judul']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['judul']; ?></h5>
            </div>
            <!-- Tombol stok yang dapat diklik, di bagian bawah card -->
            <button class="btn btn-info w-100">
              Stok Buku: <?php echo $row['stok']; ?>
            </button>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <!-- END -->

    <style>
      /* CSS untuk card dengan border-radius dan shadow */
      .card {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
        overflow: hidden;
        background-color: #f8f9fa;
        margin-bottom: 20px;
        height: 550px;
        width: 300px;
        display: flex;
        flex-direction: column;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        /* Default shadow */
      }

      /* Mengurangi jarak antar card */
      .col-md-4.mb-3 {
        margin-bottom: 10px;
        /* Jarak antar card */
        padding-left: 85px;
        /* Mengurangi jarak di antara kolom */
        padding-right: 5px;
      }

      /* Hover effect pada card */
      .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        /* Hover shadow */
      }

      /* Gambar pada card dengan kelas yang berbeda */
      .card-img-top {
        border-radius: 10px 10px 0 0;
        object-fit: cover;
        height: 300px;
        /* Sesuaikan tinggi gambar */
      }

      .class-1 {
        height: auto;
      }

      .class-2 {
        height: auto;
      }

      .class-3 {
        height: auto;
      }

      /* Desain teks pada card (Judul) */
      .card-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 15px;
      }

      .card-text {
        color: #666;
        font-size: 1.1rem;
      }

      /* Styling untuk tombol stok */
      .btn-info {
        background-color: #5500D6;
        border-color: #5500D6;
        font-size: 1.3rem;
        padding: 12px 0;
        margin-top: auto;
        /* Pastikan tombol berada di bawah */
      }

      .btn-info:hover {
        background-color: #5727A3;
        border-color: #5500D6;
      }

      .card-body{
        background-color: #fff
      }

      .content-wrapper {
        background-color: #ccced0;
        padding: 20px;
      }
    </style>

  </section>
  <!-- /.Main content -->
</div>
<!-- /.content-wrapper -->