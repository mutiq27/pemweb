<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('Connection.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_driver = $_POST['id_driver'];
      $nama= $_POST['nama'];
      $no_sim = $_POST['no_sim'];
      $alamat = $_POST['alamat'];

      //query SQL
      $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat)
       VALUES('$id_driver', '$nama', '$no_sim', '$alamat')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Input Data Driver</title>
    <!-- load css boostrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->
  </head>

  <body>
  <h2 style="margin:50px;">Form Driver</h2>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "input_driver.php"; ?>">Tambah Data Driver</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Driver berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Driver gagal disimpan</div>';
              }
           ?>

          
          <form action="input_driver.php" method="POST">
            
            <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="ID driver" name="id_driver" required="required">
            </div>
            <div class="form-group">
              <label>Nama Drriver</label>
              <input type="text" class="form-control" placeholder="Nama" name="nama" required="required">
            </div>
            <div class="form-group">
              <label>No SIM</label>
              <input type="text" class="form-control" placeholder="SIM" name="no_sim" required="required">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>