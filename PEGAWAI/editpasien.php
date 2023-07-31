<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY NIK DESC");

if( !isset($_SESSION['PEGAWAI']) )
{
  header('location:./../'.$_SESSION['akses']);
  exit();
}

$nama = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';

?>
<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{ 
  					$id = $_GET['id'];
           	$NIK = $_POST['NIK'];
            $Nama = $_POST['Nama'];
            $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
            $ID_Jenis_Kelamin = $_POST['ID_Jenis_Kelamin'];
            $Telp= $_POST['Telp'];
            $Gmail= $_POST['Gmail'];
            $Alamat = $_POST['Alamat'];
            $Keluhan = $_POST['Keluhan'];
            $Status = $_POST['Status'];
            
    
  // update user data
  $result = mysqli_query($koneksi, "UPDATE pasien SET NIK='$NIK',Nama='$Nama',Tanggal_Lahir='$Tanggal_Lahir',ID_Jenis_Kelamin='$ID_Jenis_Kelamin', Telp='$Telp',Gmail='$Gmail',Alamat='$Alamat',Keluhan='$Keluhan' WHERE Antrian= '$id'");
  
  // Redirect to homepage to display updated user in list
  header("Location: pasien.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM pasien WHERE Antrian='$id'");
 
while($user_data = mysqli_fetch_array($result))
{
  $Antrian= $user_data['Antrian'];
  $NIK = $user_data['NIK'];
  $Nama = $user_data['Nama'];
  $Tanggal_Lahir = $user_data['Tanggal_Lahir'];
  $ID_Jenis_Kelamin = $user_data['ID_Jenis_Kelamin'];
  $Telp = $user_data['Telp'];
  $Gmail = $user_data['Gmail'];
  $Alamat = $user_data['Alamat'];
  $Keluhan = $user_data['Keluhan'];
  $Status = $user_data['Status'];
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
					        	<td>ID_Pasien</td>
					        	<th><input type="text" name="Antrian" value=<?php echo $Antrian;?> disabled></th>
					      	</tr>
					      	<tr> 
					        	<td>NIK</td>
					        	<td><input type="text" name="NIK" value=<?php echo $NIK;?>></td>
					      	</tr>
					      	<tr> 
					        	<td>Nama</td>
					        	<td><input type="text" name="Nama" class="txtField" value="<?php echo $Nama;?>"></td>
					      	</tr>
					      	<tr> 
					        	<td>Tanggal_Lahir</td>
					        	<td><input type="Date" name="Tanggal_Lahir" value=<?php echo $Tanggal_Lahir;?>></td>
					      	</tr>
					   			 <tr> 
					        	<td>ID Jenis Kelamin</td>
					        	<td><input type="text" name="ID_Jenis_Kelamin" value=<?php echo $ID_Jenis_Kelamin;?>></td>
					      	</tr>
					      	<tr> 
					        	<td>Telp</td>
					        	<td><input type="text" name="Telp" value=<?php echo $Telp;?>></td>
					      	</tr>
					      	<tr> 
					        	<td>Gmail</td>
					        	<td><input type="email" name="Gmail" value=<?php echo $Gmail;?>></td>
					      	</tr>
					      	<tr> 
					        	<td>Alamat</td>
					        	<td><input type="text" name="Alamat" value=<?php echo $Alamat;?>></td>
					      	</tr>
					      	<tr> 
					        	<td>Keluhan</td>
					        	<td><input type="text" name="Keluhan" value=<?php echo $Keluhan;?>></td>
					      	</tr>
					      	<tr> 
					        	<td>Status</td>
					        	<td><input type="text" name="Status" value="<?php echo $Status;?>" disabled></td>
					      	</tr>
					      	</table>
					      	<table>
				            <tr>
				            	<th>
				            		<input type="submit" name="update" value="Edit Pasien" class="right waves-effect waves-light btn green darken-2" style="float: left;">
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