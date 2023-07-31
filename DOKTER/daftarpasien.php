<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM riwayat ORDER BY NIK DESC");

if( !isset($_SESSION['DOKTER']) )
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
				<div class="col s12 m12 l12 offset-l2"> <br>
					<!--kolom search-->
					<div class="col s12 m12 l12">
						<form name="cari" method="post" action="caridaftarpasien.php" class="row">
	                    	<div class="e-input-field col s12 m12 l12">
	                    		<input type="text" name="cari" placeholder="Cari Berdasarkan Nama / NIK / Alamat / Telepon / Gmail " class="validate" required title="Cari User">
	                    		<input type="submit" name="cari2" value="cari" class="btn right blue darken-2"> 
	                    	</div>
						</form>
					</div>

					<!--table-->
					<div class="col s12 m12 l12 card-panel z-depth"> <br>
						<table class="highlight">
							<!--kolom header table-->
							<tr>
			                  
								<th>NIK</th>
								<th>Nama</th>
								<th>Tanggal Lahir</th>
								<th>ID J. Kelamin</th>
								<th>Telp</th>
								<th>Gmail</th>
								<th>Alamat</th>
								
						

				            </tr>

							<?php 

							while($user_data = mysqli_fetch_array($result)) { 
			                    $test = $user_data['Nama']; 
				                echo "<tr>";
			                    
				                echo "<td> <h6>".$user_data['NIK']."</h6></td>";
				                echo "<td> <h6>".$user_data['Nama']."</h6></td>";
				                echo "<td><h6>".$user_data['Tanggal_Lahir']."</h6></td>";
				                echo "<td><h6>".$user_data['ID_Jenis_Kelamin']."</h6></td>";
				                $lenght = 4;
				                $Telp = $user_data['Telp'];
				                echo "<td> <h6>".substr($Telp, 0, $lenght).' ...'."</h6> </td>";
				               	$lenght = 4;
				               	$Gmail = $user_data['Gmail'];
				               	echo "<td> <h6>".substr($Gmail, 0, $lenght).' ...'."</h6> </td>";
				               	$lenght = 10;
				                $alamat = $user_data['Alamat'];
				                echo "<td> <h6>".substr($alamat, 0, $lenght).' ...'."</h6> </td>";
			         
			           
				                echo "<td><a href='hapuspasien.php?id=$user_data[NIK]' style='text-decoration: none;'><i class='material-icons' title='delete $test'>mode_delete</i></a><a href='tambahantrian.php?id=$user_data[NIK]' style='text-decoration: none;'><i class='material-icons right'>add</i></a></td></tr>";
				                
				            }

							?>

							
						</table>
						<table>
							<tr>
				          			<td colspan='9'>
				            		<a href='pasien.php' class="right waves-effect waves-light btn blue darken-2">KEMBALI</a>
				            	</td>
				            </tr>
						</table>
					</div>
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
	<script>
        $(".hapus").click(function () {
        var jawab = confirm("Anda Yakin Ingin Menghapus User ?");
        if (jawab === true) {
        // konfirmasi
            var hapus = false;
            if (!hapus) {
                hapus = true;
                $.post('hapuspasien.php', {id: $(this).attr('data-id')},
                function (data) {
                    alert(data);
                });
                hapus = false;
            }
        } else {
            return false;
        }
        });
      </script>
</body>
</html>