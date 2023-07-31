<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY nik DESC");

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
								
				           
				              
				            <tr>
				              <th>NIK</th>
				              <th><input type="text" name="NIK" required maxlength="50"></th>
				            </tr>
				            <tr>
				              <th>Nama</th>
				              <th><input type="text" name="Nama" required maxlength="50"></th>
				            </tr>
				            <tr>
				              <th>Tanggal Lahir</th>
				              <th><input type="date" name="Tanggal_Lahir" value="" class="form-control" required maxlength="50"></th>
				            </tr>
				            <tr>
				            	<tr>
				              <th>ID Jenis Kelamin</th>
				              <th><input type="text" name="ID_Jenis_Kelamin" placeholder="Isi Dengan 01=Pria / 02=Wanita !"></th>
				            </tr>
				            <tr>
				            	<tr>
				              <th>Telp</th>
				              <th><input type="text" name="Telp" required maxlength="15"></th>
				            </tr>
				            <tr>
				            	<tr>
				              <th>Gmail</th>
				              <th><input type="text" name="Gmail" required maxlength="15"></th>
				            </tr>
				            <tr>
				              <th>Alamat</th>
				              <th><input type="text" name="Alamat" required maxlength="50"></th>
				            </tr>
				            <tr>
				              <th>Keluhan</th>
				              <th><input type="text" name="Keluhan" ></th>
				            </tr>
				            
						</table>
						<table>
				            <tr>
				            	<th>
				            		<input type="submit" name="tambah" value="Tambah User" class="right waves-effect waves-light btn green darken-2" style="float: left;">
				            	</th>
				            	<th style="width: 1%;">
				            		<a href="pasien.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a>
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
          	$NIK = $_POST['NIK'];
            $Nama = $_POST['Nama'];
            $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
            $ID_Jenis_Kelamin = $_POST['ID_Jenis_Kelamin'];
            $Telp= $_POST['Telp'];
            $Gmail= $_POST['Gmail'];
            $Alamat = $_POST['Alamat'];
           
            

            // include database connection file
            include_once("../config.php");

            // Insert user data into table
             $result = mysqli_query($koneksi, "INSERT INTO `pasien` (`NIK`, `Nama`, `Tanggal_Lahir`, `ID_Jenis_Kelamin`, `Telp`,`Gmail`, `Alamat`, `Keluhan`,`Status`) VALUES('$NIK','$Nama','$Tanggal_Lahir','$ID_Jenis_Kelamin','$Telp','$Gmail','$Alamat','$Keluhan','Blum Disetujui')");
            

            if ($NIK == NULL)
            {
            	echo "<script>alert('Gagal Menambah User dengan Nama $Nama')</script>";
            }
            else
            {
            	echo "<script>alert('Tambah User Dengan Nama $Nama Berhasil')</script>";
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
