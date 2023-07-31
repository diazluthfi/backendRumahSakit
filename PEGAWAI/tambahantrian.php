<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM riwayat ORDER BY NIK DESC");

if( !isset($_SESSION['PEGAWAI']) )
{
  header('location:./../'.$_SESSION['akses']);
  exit();
}

$nama = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';

?>
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
            $Keluhan = $_POST['Keluhan'];
           
            

            // include database connection file
            include_once("../config.php");

            // Insert user data into table
             $result = mysqli_query($koneksi, "INSERT INTO `pasien` (`NIK`, `Nama`, `Tanggal_Lahir`, `ID_Jenis_Kelamin`, `Telp`,`Gmail`, `Alamat`, `Keluhan`,`Status`) VALUES('$NIK','$Nama','$Tanggal_Lahir','$ID_Jenis_Kelamin','$Telp','$Gmail','$Alamat','$Keluhan','Blum Disetujui')");
            

            if ($Nama == NULL)
            {
            	echo "<script>alert('Gagal Menambah Antrian dengan Nama $Nama')</script>";
            }
            else
            {
            	echo "<script>alert('Tambah Antrian Dengan Nama $Nama Berhasil')</script>";
            }

          }
        ?>


<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE NIK='$id'");
 
while($user_data = mysqli_fetch_array($result))
{
  
  $NIK = $user_data['NIK'];
  $Nama = $user_data['Nama'];
  $Tanggal_Lahir = $user_data['Tanggal_Lahir'];
  $ID_Jenis_Kelamin = $user_data['ID_Jenis_Kelamin'];
  $Telp = $user_data['Telp'];
  $Gmail = $user_data['Gmail'];
  $Alamat = $user_data['Alamat'];

}
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
					        
					        	<input type="hidden" type="text" name="NIK" value="<?php echo $NIK;?>">
					      	</tr>
					      	<tr> 
					        
					        	<input type="hidden" type="text" name="Nama" class="txtField" value="<?php echo $Nama;?>">
					      	</tr>
					      	<tr> 
					        	
					        	<input type="hidden" type="Date" name="Tanggal_Lahir" value="<?php echo $Tanggal_Lahir;?>">
					      	</tr>
					   		 <tr> 
					        	
					        	<input type="hidden" type="text" name="ID_Jenis_Kelamin" value="<?php echo $ID_Jenis_Kelamin;?>">
					      	</tr>
					      	<tr> 
					        	
					        	<input type="hidden" type="text" name="Telp" value="<?php echo $Telp;?>">
					      	</tr>
					      	<tr> 
					        	
					        	<input type="hidden" type="email" name="Gmail" value="<?php echo $Gmail;?>">
					      	</tr>
					      	<tr> 
					        	<input type="hidden" type="text" name="Alamat" value="<?php echo $Alamat;?>">
					      	</tr>
					      	<tr>
				              <th>Keluhan</th>
				              <th><input type="text" name="Keluhan" ></th>
				            </tr>
					      	</table>
					      	<table>
				            <tr>
				            	<th>
				            		<input type="submit" name="tambah" value="Tambah Ke Antrian" class="right waves-effect waves-light btn green darken-2" style="float: left;">
				            	</th>
				            	<th style="width: 1%;">
				            		<a href="daftarpasien.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a> 
				            	</th>
				            </tr>
				        </table>
					</div>
				</form>
				</div>
			</div>
		</main>
        <!--end of content-->

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