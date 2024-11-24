<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kasir</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Style untuk H1 */
        .content-header h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #ffd700;
            /* Aksen emas */
        }

        /* Background */
        body {
            background: linear-gradient(to bottom right, #6a11cb, #2575fc);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }

        .content-wrapper {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 800px;
        }

        /* Form styling */
        .form-group label {
            font-weight: 600;
            color: #ffd700;
            /* Aksen emas */
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 10px;
            padding: 15px;
            font-size: 16px;
            color: #fff;
            box-sizing: border-box;
            outline: none;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 8px #ffd700;
            /* Aksen fokus */
        }

        /* Tombol simpan */
        .btn-primary {
            background: linear-gradient(45deg, #ff6a00, #ee0979);
            border: none;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #ee0979, #ff6a00);
            transform: scale(1.05);
        }

        /* Kolom maksimal 4 */
        .col-md-6 {
            margin-bottom: 20px;
        }

        /* Lebar maksimal untuk formulir */
        .col-md-8 {
            max-width: 800px;
        }

        /* Footer tombol simpan */
        .box-footer {
            text-align: center;
        }

        /* Aksen emas tambahan */
        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid #ffd700;
            border-radius: 10px;
            padding: 10px;
            font-size: 14px;
            font-weight: bold;
            color: #ffd700;
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background: #ffd700;
            color: #6a11cb;
        }
    </style>

</head>

<body>
    <!-- Content Wrapper -->
    <div class="container">
        <div class="content-wrapper mx-auto">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 class="text-center">TAMBAH KASIR</h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row justify-content-center">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <form role="form" method="post" action="../pages/register_process.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" name="telepon" class="form-control" placeholder="Telepon" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Posisi</label>
                                        <select name="status" class="form-control" required>
                                            <option disabled selected value="">Pilih Posisi</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Pegawai">Pegawai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control" required>
                                            <option disabled selected value="">Pilih Level</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Pegawai">Pegawai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" title="Simpan Data">
                                    <i class="fas fa-save"></i> Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>