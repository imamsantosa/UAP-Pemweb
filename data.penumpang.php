<?php
require_once('kereta.class.php');
require_once('penumpang.class.php');
if (!isset($_GET['id'])) {
  header('location: index.php');
}
$id_kereta = $_GET['id'];

$penumpang = new penumpang();
$kereta = new Kereta();
$data_penumpang = $penumpang->listPenumpang($id_kereta);
$data_kereta = $kereta->dataKereta($id_kereta);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../favicon.ico">

  <title>UAP Pemweb</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="assets/bootstrap/css/santosa.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body style="background-color : rgba(239, 239, 239, 0.45);">
    <header>
      <nav class="navbar navbar-inverse" style="border-radius: 0px;">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tiket System</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li ><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
              <li ><a href="data.kereta.php">Data Kereta <span class="sr-only">(current)</span></a></li>
              <li ><a href="input.data.kereta.php">Input Kereta</a></li>
              <li ><a href="input.data.penumpang.php">Input Penumpang</a></li>
              
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header> 
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <h2 class="text-center">Data Penumpang kereta api <?php echo $data_kereta['nama'];?> </h2>
              <hr>
              <?php
                if (isset($_GET['status'])) {
                  ?>
                    <div class="alert alert-<?php echo $_GET['status'];?>">
                      <?php echo $_GET['message'];?>
                    </div>
                  <?php
                }
              ?>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Penumpang</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($data_penumpang as $kereta) {
                      # code...
                      ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $kereta['nama'];?></td>
                        <td><?php echo $kereta['tanggal_lahir'];?></td>
                        <td><?php echo $kereta['jenis_kelamin'];?></td>
                        <td>
                          <a href="edit.data.penumpang.php?id=<?php echo $kereta['id_penumpang'];?>" >Edit Data | </a>
                          <a href="hapus.data.penumpang.php?id=<?php echo $kereta['id_penumpang'];?>" >Hapus Data</a>

                        </td>
                      </tr>
                      <?php
                    }

                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
  </html>