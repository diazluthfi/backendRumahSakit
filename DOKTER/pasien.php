<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY nik DESC");

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
						<form name="cari" method="post" action="caripas.php" class="row">
	                    	<div class="e-input-field col s12 m12 l12">
	                    		<input type="text" name="cari" placeholder="Cari Berdasarkan Antrian / NIK / Nama   " class="validate" required title="Cari User">
	                    		<input type="submit" name="cari2" value="cari" class="btn right green darken-2"> 
	                    	</div>
						</form>
					</div>
						<div class="card-action">
				            	<td colspan='9'>
				            	
				            		
				            			
				            		 <th><a href="daftarpasien.php" class="green-text text-darken-2">Daftar Pasien</a>
                         			 <i class="material-icons left green-text text-darken-2">visibility</i></th>
                        		  	 
                      		  </div>
					<!--table-->
					<div class="col s12 m12 l12 card-panel z-depth"> <br>
						<table class="highlight">
							<!--kolom header table-->
							<tr>
			                  <th >Antrian</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Tanggal Lahir</th>
								<th>ID J. Kelamin</th>
								<th>Telp</th>
								<th>Gmail</th>
								<th>Alamat</th>
								<th>Keluhan</th>
								<th>Status</th>
								
				            </tr>
				

							<?php 

							while($user_data = mysqli_fetch_array($result)) { 
			                    $test = $user_data['Nama']; 
				                echo "<tr>";
			                    echo "<td >".$user_data['Antrian']."</td>";
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
			                    echo "<td><h6>".$user_data['Keluhan']."</h6></td>";
			                    if ($user_data['Status']=='Blum Disetujui') {
			                    	echo "<td><a class='btn btn-info green darken-2' href='validasi.php?id=$user_data[Antrian]' >".$user_data['Status']."</a></td>";
			                
			                    }
			                    else {
			                    	 echo '<td><button type="button" disabled>'.$user_data['Status']."</button></h6></td>";
			                    }
			                      
				                echo "<td> <a href='editpasien.php?id=$user_data[Antrian]' style='text-decoration: none;'><i class='material-icons' title='Edit $test'>mode_edit</i></a>   <a data-id='1' class='hapus' href='deletepasien.php?id=$user_data[Antrian]' style='text-decoration: none;'><i class='material-icons' title='Hapus $test'>delete</i></a></td></tr>";

				            }

							?>

							
						</table>
						<table>
							<tr>
								<div class="card-action">
				            	<td colspan='9'>
								<a href='tambahpasien.php' class="right waves-effect waves-light btn green darken-2">Tambah Pasien<i class="material-icons right">add</i></a>
							</td>
								</div>
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
        var jawab = confirm("Anda Yakin Ingin Menghapus Pasien ?");
        if (jawab === true) {
        // konfirmasi
            var hapus = false;
            if (!hapus) {
                hapus = true;
                $.post('deletepasien.php', {id: $(this).attr('data-id')},
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