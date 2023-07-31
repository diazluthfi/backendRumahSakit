<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM perawatan ORDER BY ID_Rawat DESC");

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
								
				           
				              <th>ID Rawat</th>
				              <th><input type="text" name="ID_Rawat" required></th>
				            
				            <tr>
				              <th>Jam</th>
				              <th><input type="time" name="Jam" value="" class="form-control"></th>
				            </tr>
				              <th>Tanggal</th>
				              <th><input type="date" name="Tanggal" value="" class="form-control" required maxlength="50"></th>
				            </tr>
				            	<tr>
				              <th>Antrian</th>
				              <th><input type="text" name="Antrian" required></th>
				            </tr>
				            <tr>
				              <th>ID Pegawai</th>
				              <th>	
				                <input type="text" name="ID_Pegawai" required>
				              </th>
				            </tr>
				            <tr>
				              <th>ID Dokter</th>
				              <th>	
				                <input type="text" name="ID_Dokter" required>
				              </th>
				            </tr>
				            <tr>
				              <th>ID Obat</th>
				              <th>	
				                <input type="text" name="ID_Obat" required>
				              </th>
				            </tr>
				            
				            
						</table>
						<table>
				            <tr>
				            	<th>
				            		<input type="submit" name="tambah" value="Tambah Perawatan" class="right waves-effect waves-light btn green darken-2" style="float: left;">
				            	</th>
				            	<th style="width: 1%;">
				            		<a href="Perawatan.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a>
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
            $ID_Rawat = $_POST['ID_Rawat'];
            $Jam = $_POST['Jam'];
            $Tanggal = $_POST['Tanggal'];
            $Antrian= $_POST['Antrian'];
            $ID_Pegawai = $_POST['ID_Pegawai'];
            $ID_Dokter = $_POST['ID_Dokter'];
            $ID_Obat = $_POST['ID_Obat'];
            

            // include database connection file
            include_once("../config.php");

            // Insert user data into table
             $result = mysqli_query($koneksi, "INSERT INTO  perawatan (`ID_Rawat`, `Jam`, `Tanggal`, `Antrian`, `ID_Pegawai`, `ID_Dokter`, `ID_Obat`) VALUES('$ID_Rawat', '$Jam', '$Tanggal', '$Antrian', '$ID_Pegawai', '$ID_Dokter','$ID_Obat')");
            

            if ($ID_Rawat == NULL)
            {
            	echo "<script>alert('Gagal Menambah User dengan ID Rawat $ID_Rawat')</script>";
            }
            else
            {
            	
            	echo "<script>alert('Tambah User Dengan ID Rawat $ID_Rawat Berhasil')</script>";
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