<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM struk ORDER BY ID_Struk DESC");

if( !isset($_SESSION['PEGAWAI']) )
{
  header('location:./../'.$_SESSION['akses']);
  exit();
}

$nama = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';

?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="shortcut icon" href="../imagesa/icon.jpg">
  <!--Import Google Icon Font-->
    <link href="../fontsa/material.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../cssa/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
      .btn.modal-trigger{display:block; width:100%; padding:30px;line-height:0px}
    </style>
</head>
<body>
  <div class="row">
    <!--header-->
    <header>
      <!--TopNav-->
          <nav class="row top-nav grey light-2">
          <div class="container">
            <div class="col offset-l2 nav-wrapper">
              <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
              <a href="index.php">Beranda</a>
            </div>
          </div>
      </nav>

      <!--Sidenav-->
      <ul id="slide-out" class="side-nav fixed">

              <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                      <div class="user-view">
                          <div class="background" style="margin-bottom:-20%;">
                            <img src="../imagesa/se.jpg">
                          </div>
                        <span class="white-text name"><?php echo $nama; ?><i class="material-icons left">account_circle</i></span>
                      </div>
                    </li>

                    <li><div class="divider" style="margin-top:20%;"></div></li>

                    <li><a class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

                    <li>
                      <a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="Pasien.php">pasien</a></li>
                          <li><a href="Obat.php">obat</a></li>
                          <li><a href="Kamar.php">kamar</a></li>
                          <li><a href="Perawatan.php">perawatan</a></li>
                          <li><a href="struk.php">struk</a></li>
                </ul>
              </div>
                    </li>

                    <li><a href="../logout.php" class="collapsible-header">Keluar<i class="material-icons">exit_to_app</i></a></li>

                </ul>
              </li>

          </ul>
    </header>
    <!--end of header-->

		<!--content-->
		<main>
			<div class="row container">
				<div class="col s12 m12 l10 offset-l3"> <br>

					<!--table-->
				<form action="" method="post" name="form1">
					<div class="col s12 m12 l12 card-panel z-depth"> <br>
						<table class="highlight">
							<!--kolom isian table-->
								
				           
				              <th>ID Struk</th>
				              <th><input type="text" name="ID_Struk" required></th>
				            
				            <tr>
				              <th>ID_Pegawai</th>
				              <th><input type="text" name="ID_Pegawai" required maxlength="50"></th>
				            </tr>
				            <tr>
				              <th>Antrian</th>
				              <th><input type="text" name="Antrian" required maxlength="50"></th>
				            </tr>
				            <tr>
				              <th>Tanggal Masuk</th>
				              <th><input type="date" name="Tanggal_Masuk" value="" class="form-control" required maxlength="50"></th>
				            </tr>
				            <tr>
				            	<tr>
				              <th>ID Rawat</th>
				              <th><input type="text" name="ID_Rawat" required maxlength="15"></th>
				            </tr>
				            
				            
				            
						</table>
						<table>
				            <tr>
				            	<th>
				            		<input type="submit" name="tambah" value="Tambah Struk" class="right waves-effect waves-light btn green darken-2" style="float: left;">
				            	</th>
				            	<th style="width: 1%;">
				            		<a href="Struk.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a>
				            	</th>
				            </tr>
				        </table>
					</div>
				</form>
				</div>
			</div>
		</main>
        <!--end of content-->

        <!-- Proses Penambahan Data User -->

        <?php

          // Check If form submitted, insert form data into users table.
          if(isset($_POST['tambah'])) {
            $ID_Struk = $_POST['ID_Struk'];
            $ID_Pegawai = $_POST['ID_Pegawai'];
            $Antrian = $_POST['Antrian'];
            $Tanggal_Masuk = $_POST['Tanggal_Masuk'];
            $ID_Rawat= $_POST['ID_Rawat'];
           
            

            // include database connection file
            include_once("../config.php");

            // Insert user data into table
             $result = mysqli_query($koneksi, "INSERT INTO struk (`ID_Struk`, `ID_Pegawai`, `Antrian`, `Tanggal_Masuk`, `ID_Rawat`) VALUES('$ID_Struk', '$ID_Pegawai', '$Antrian', '$Tanggal_Masuk', '$ID_Rawat')");
            

            if ($ID_Struk == NULL)
            {
            	echo "<script>alert('Gagal Menambah Struk dengan ID Struk $ID_Struk')</script>";
            }
            else
            {
            	
            	echo "<script>alert('Tambah Struk Dengan ID Struk $ID_Struk Berhasil')</script>";
            }

          }
        ?>

        <!-- End -->


	</div>

	<script type="text/javascript" src="../jsa/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../jsa/materialize.min.js"></script>
	<script type="text/javascript">
	  	$(document).ready(function(){
	    	$('.collapsible').collapsible();
	    	$(".button-collapse").sideNav();
		});
	</script>
</body>
</html>