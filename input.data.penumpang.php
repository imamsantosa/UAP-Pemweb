<?php
require_once('penumpang.class.php');
require_once('kereta.class.php');

$penumpang = new Penumpang();
$kereta = new Kereta();

$list_kereta = $kereta->listKereta();
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
              <li><a href="input.data.kereta.php">Input Kereta</a></li>
              <li class="active"><a href="input.data.penumpang.php">Input Penumpang</a></li>
              
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
              <h2 class="text-center">Input Data Penumpang</h2>
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
              <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" placeholder="Nama Penumpang" name="nama" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                      <option>Laki - Laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kereta</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="id_kereta" id="id_kereta">
                    <?php
                      foreach ($list_kereta as $kereta) {
                        echo '<option value="'.$kereta['id_kereta'].'">'.$kereta['nama'].' - '.$kereta['kelas'].'</option>';
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="simpan" class="btn btn-primary" value="simpan data">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
  </html>
    <?php
    if (isset($_POST['simpan'])) {
      if($penumpang->inputPenumpang($_POST)){
        header('location: ?status=success&message=Sukses menambah penumpang!!!');
      } else {
        header('location: ?status=danger$message=Gagal menambah penumpang!!');
      }
    }
  ?>
  