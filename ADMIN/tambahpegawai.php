<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nik DESC");

if( !isset($_SESSION['ADMIN']) )
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
	       /* label color */
	       .e-input-field label {
	         color: #000;
	       }
	       /* label focus color */
	       .e-input-field input[type=text]:focus + label,.e-input-field input[type=password]:focus + label {
	         color: #d32f2f !important;
	       }
	       /* label underline focus color */
	       .e-input-field input[type=text]:focus,.e-input-field input[type=password]:focus {
	         border-bottom: 1px solid #d32f2f !important;
	         box-shadow: 0 1px 0 0 #d32f2f !important;
	       }
	       /* valid color */
	       .e-input-field input[type=text].valid,.e-input-field input[type=password].valid {
	         border-bottom: 1px solid #d32f2f !important;
	         box-shadow: 0 1px 0 0 #d32f2f !important;
	       }
	       /* invalid color */
	       .e-input-field input[type=text].invalid,.e-input-field input[type=password].invalid {
	         border-bottom: 1px solid #d32f2f !important;
	         box-shadow: 0 1px 0 0 #d32f2f !important;
	       }
	       /* icon prefix focus color */
	       .e-input-field .prefix.active {
	         color: #d32f2f !important;
	       }
	    </style>
</head>
<body>
	<div class="row">
		<!--header-->
		<header>
			<!--TopNav-->
	        <nav class="row top-nav blue darken-2">
	    		<div class="container">
	    			<div class="col offset-l2 nav-wrapper">
	    				<a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
	    				<a class="page-title">Beranda</a>
	    			</div>
	    		</div>
			</nav>

			<!--Sidenav-->
			<ul ID_Pegawai="slide-out" class="side-nav fixed">

	            <li class="no-padding">
		            <ul class="collapsible collapsible-accordion">
		                 <li>
		                	<div class="user-view">
		                    	<div class="background" style="margin-bottom:-15%;">
		                    		<img src="../imagesa/bg3.jpg">
		                    	</div>
		                		<span class="white-text name"><?php echo $nama; ?><i class="material-icons left">account_circle</i></span>
		                	</div>
		                </li>

		                <li><div class="divider" style="margin-top:15%;"></div></li>

		                <li><a href=index.php class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

		                <li>
		                	<a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
		                	<div class="collapsible-body">
		                		<ul>									
		                	<li><a href="pegawai.php">pegawai</a></li>
                          <li><a href="Dokter.php">dokter</a></li>
                          <li><a href="Pasien.php">pasien</a></li>
                          <li><a href="Obat.php">obat</a></li>
                          <li><a href="Kamar.php">kamar</a></li>
                          <li><a href="Perawatan.php">perawatan</a></li>
                          <li><a href="Spesialis.php">spesialis</a></li>
                          <li><a href="Bagian.php">bagian</a></li>
                          <li><a href="Struk.php">struk</a></li>
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
								
				           
				              <th>ID Pegawai</th>
				              <th><input type="text" name="ID_Pegawai" required></th>
				            
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
				              <th>Telp</th>
				              <th><input type="text" name="Telp" required maxlength="15"></th>
				            </tr>
				            <tr>
				            	<tr>
				              <th>ID Jenis Kelamin</th>
				              <th><input type="text" name="ID_Jenis_Kelamin" placeholder="Isi Dengan 01=Pria / 02=Wanita !"></th>
				            </tr>
				            <tr>
				              <th>Kode Bagian</th>
				              <th>	
				                <input type="text" name="Kode_Bagian" required>
				              </th>
				            </tr>
				            <tr>
				              <th>Username</th>
				              <th><input type="text" name="username" required></th>
				            </tr>
				            <tr>
				              <th>Password</th>
				              <th><input type="password" name="password" required></th>
				            </tr>
				            
						</table>
						<table>
				            <tr>
				            	<th>
				            		<input type="submit" name="tambah" value="Tambah User" class="right waves-effect waves-light btn green darken-2" style="float: left;">
				            	</th>
				            	<th style="width: 1%;">
				            		<a href="pegawai.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a>
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
            $ID_Pegawai = $_POST['ID_Pegawai'];
            $NIK = $_POST['NIK'];
            $Nama = $_POST['Nama'];
            $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
            $Telp= $_POST['Telp'];
            $ID_Jenis_Kelamin = $_POST['ID_Jenis_Kelamin'];
            $Kode_Bagian = $_POST['Kode_Bagian'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            

            // include database connection file
            include_once("../config.php");

            // Insert user data into table
             $result = mysqli_query($koneksi, "INSERT INTO `pegawai` (`ID_Pegawai`, `NIK`, `Nama`, `Tanggal_Lahir`, `Telp`, `ID_Jenis_Kelamin`, `Kode_Bagian`, `username`, `password`) VALUES('$ID_Pegawai','$NIK','$Nama','$Tanggal_Lahir','$Telp','$ID_Jenis_Kelamin','$Kode_Bagian','$username','$password')");
            

            if ($Kode_Bagian == "ADMIN")
            {
            	echo "<script>alert('Tambah User Dengan ID Pegawai $ID_Pegawai Berhasil')</script>";
            }
            elseif ($Kode_Bagian == 'NOT NULL')
            {
            	echo "<script>alert('Tambah User Dengan NIK $ID_Pegawai Berhasil')</script>";
            }
            else
            {
            	echo "<script>alert('Gagal Menambah User dengan NIK $ID_Pegawai')</script>";
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
