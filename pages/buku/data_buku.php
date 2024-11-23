<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>DATA BUKU</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA BUKU</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row mb-3">
      <div class="col-md-12 d-flex justify-content-between">
        <a href="index.php?page=tambah_buku" class="btn btn-primary" title="Tambah Data" style="margin-bottom: 20px;">
          <i class="glyphicon glyphicon-plus"></i> Tambah Buku
        </a>
        <a href="pages/report.php" class="btn btn-success" title="Print Data" style="margin-bottom: 20px;">
          <i class="glyphicon glyphicon-print"></i> Print Data
        </a>
      </div>
    </div>

    <!-- Card Grid Layout -->
    <div class="row">
      <?php
      include "conf/conn.php";
      $no = 0;
      $query = mysqli_query($koneksi, "call databuku()") or die(mysqli_error($koneksi));
      while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="card shadow-lg rounded-md">
            <div class="card-image">
              <img src="dist/img/<?= $row["gambar"]; ?>" class="card-img-top" alt="<?= $row['judul']; ?>"
                style="height: 200px; object-fit: cover;">
              <div class="card-overlay">
                <h5 class="card-overlay-title"><?= $row['judul']; ?></h5>
              </div>
            </div>
            <div class="card-body p-3">
              <p><strong>Penulis:</strong> <?= $row['penulis']; ?></p>
              <p><strong>Penerbit:</strong> <?= $row['penerbit']; ?></p>
              <p><strong>Tahun:</strong> <?= $row['tahun']; ?></p>
              <p><strong>Stok:</strong> <?= $row['stok']; ?></p>
              <p><strong>Harga Jual:</strong> <?= number_format($row['harga_jual'], 2, ',', '.'); ?></p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <a href="index.php?page=ubah_buku&id=<?= $row['id_buku']; ?>"
                class="btn btn-outline-primary btn-sm">Ubah</a>
              <a href="pages/buku/hapus_buku.php?id=<?= $row['id_buku']; ?>" class="btn btn-outline-danger btn-sm"
                onclick="return confirm('Apakah Anda yakin ingin menghapus data buku ini?')">Hapus</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function () {
    $('#buku').DataTable();
  });

  function hapusdistributor(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      window.location.href = "pages/buku/hapus_buku.php?id=" + id;
    }
  }
</script>

<!-- CSS Styling -->
<style>
  body {
    background-color: #f4f6f9;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .content-header h1 {
    font-size: 2.2rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 20px;
  }

  .breadcrumb {
    background-color: transparent;
    padding: 0;
  }

  .breadcrumb a {
    color: #3498db;
  }

  .breadcrumb .active {
    color: #7f8c8d;
  }

  .card {
    border: none;
    border-radius: 10px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    margin-bottom: 30px;
    /* Menambahkan jarak ke bawah card */
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  }

  .card-image {
    position: relative;
    overflow: hidden;
    border-radius: 10px 10px 0 0;
  }

  .card-img-top {
    width: 100%;
    object-fit: cover;
    height: 200px;
  }

  .card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    padding: 10px;
    text-align: center;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
  }

  .card-image:hover .card-overlay {
    opacity: 1;
  }

  .card-overlay-title {
    font-size: 1.25rem;
    font-weight: 600;
  }

  .card-body {
    padding: 15px;
    font-size: 1rem;
    color: #555;
  }

  .card-footer {
    padding: 10px 15px;
    background-color: #f9f9f9;
    border-top: 1px solid #e1e1e1;
  }

  .btn-outline-primary,
  .btn-outline-danger {
    border-radius: 20px;
    padding: 6px 15px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .btn-outline-primary:hover,
  .btn-outline-danger:hover {
    background-color: #3498db;
    color: white;
  }

  .d-flex {
    justify-content: space-between;
  }

  /* Jarak antara tombol tambah dan print */
  .row.mb-3 {
    margin-bottom: 30px;
  }
</style>