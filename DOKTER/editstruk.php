<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM struk ORDER BY ID_Struk DESC");

if( !isset($_SESSION['DOKTER']) )
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
            $ID_Pegawai = $_POST['ID_Pegawai'];
            $Antrian = $_POST['Antrian'];
            $Tanggal_Masuk= $_POST['Tanggal_Masuk'];
            $ID_Rawat = $_POST['ID_Rawat'];
            
            
    
  // update user data
  $result = mysqli_query($koneksi, "UPDATE struk SET ID_Pegawai='$ID_Pegawai',Antrian='$Antrian',Tanggal_Masuk='$Tanggal_Masuk',ID_Rawat='$ID_Rawat'WHERE ID_Struk= '$id'");
  
  // Redirect to homepage to display updated user in list
  header("Location: Struk.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM struk WHERE ID_Struk='$id'");
 
while($user_data = mysqli_fetch_array($result))
{
  $ID_Struk= $user_data['ID_Struk'];
  $ID_Pegawai = $user_data['ID_Pegawai'];
  $Antrian = $user_data['Antrian'];
  $Tanggal_Masuk = $user_data['Tanggal_Masuk'];
  $ID_Rawat = $user_data['ID_Rawat'];
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
          <nav class="row top-nav green darken-2">
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
                            <img src="../imagesa/index.png">
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
                          <li><a href="Struk.php">struk</a></li>
                </ul>
              </div>
                    </li>

                    <li><a href="../logout.php" class="collapsible-header">Keluar<i class="material-icons">exit_to_app</i></a></li>

                </ul>
              </li>

          </ul>
    </header>

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
					        	<td>ID Struk</td>
					        	<th><input type="text" name="ID_Struk" value=<?php echo $ID_Struk;?> disabled></th>
					      	</tr>
					      	<tr> 
					        	<td>ID Pegawai</td>
					        	<td><input type="text" name="ID_Pegawai" value=<?php echo $ID_Pegawai;?>></td>
					      	</tr>
					      	<tr> 
					        	<td>Antrian</td>
					        	<td><input type="text" name="Antrian" class="txtField" value="<?php echo $Antrian;?>"></td>
					      	</tr>
					      	<tr> 
					        	<td>Tanggal Masuk</td>
					        	<td><input type="Date" name="Tanggal_Masuk" value=<?php echo $Tanggal_Masuk;?>></td>
					      	</tr>
					    
					      	<tr> 
					        	<td>ID Rawat</td>
					        	<td><input type="text" name="ID_Rawat" value=<?php echo $ID_Rawat;?>></td>
					      	</tr>
					      	
					      	</table>
					      	<table>
				            <tr>
				            	<th>
				            		<input type="submit" name="update" value="Edit Struk" class="right waves-effect waves-light btn green darken-2" style="float: left;">
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