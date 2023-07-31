<?php session_start();
include_once("../config.php");
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$result = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY NIK DESC");

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
	         color: #176ae6 !important;
	       }
	       /* label underline focus color */
	       .e-input-field input[type=text]:focus,.e-input-field input[type=password]:focus {
	         border-bottom: 1px solid #176ae6 !important;
	         box-shadow: 0 1px 0 0 #176ae6 !important;
	       }
	       /* valid color */
	       .e-input-field input[type=text].valid,.e-input-field input[type=password].valid {
	         border-bottom: 1px solid #176ae6 !important;
	         box-shadow: 0 1px 0 0 #176ae6 !important;
	       }
	       /* invalid color */
	       .e-input-field input[type=text].invalid,.e-input-field input[type=password].invalid {
	         border-bottom: 1px solid #176ae6 !important;
	         box-shadow: 0 1px 0 0 #176ae6 !important;
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
		                    	<div class="background" style="margin-bottom:-15%;">
		                    		<img src="../imagesa/bg3.jpg">
		                    	</div>
		                		<span class="white-text name"><?php echo $nama; ?><i class="material-icons left">account_circle</i></span>
		                	</div>
		                </li>
		                
		                <li><div class="divider" style="margin-top:15%;"></div></li>

		                <li><a class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

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
                          <li><a href="bagian.php">bagian</a></li>
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
				<div class="col s12 m12 l12 offset-l2"> <br>
					<!--kolom search-->
					<div class="col s12 m12 l12">
						<form name="cari" method="post" action="" class="row">
	                    	<div class="e-input-field col s12 m12 l12">
	                    		<input type="text" name="cari" placeholder="Cari Berdasarkan Nama / NIK / Alamat / Telepon / Status  " class="validate" required title="Cari User">
	                    		<input type="submit" name="cari2" value="cari" class="btn right blue darken-2"> 
	                    	</div>
						</form>
					</div>

					<!--table-->
					<div class="col s12 m12 l12 card-panel z-depth"> <br>
						<table class="highlight">
							<!--kolom header table-->
							

							<?php 
			                    if(isset($_POST['cari2'])){
			                    $cari = $_POST['cari'];
			                    $pnjng = 100;
			                    $substr = substr($cari, 0, $pnjng).' ...';
			                    $sql = "SELECT * FROM pasien WHERE Antrian LIKE '%$cari%' OR NIK LIKE '%$cari%' OR Nama LIKE '%$cari%' OR Tanggal_Lahir LIKE '%$cari%' OR ID_Jenis_Kelamin LIKE '%$cari%' OR Alamat LIKE '%$cari%'";
			                    $query = mysqli_query($conn,$sql);


			                      if($query!=NULL);

			                       echo "
			                        	<tr>
						                	<th>Antrian</th>
											<th>NIK</th>
											<th>Nama</th>
											<th>Tanggal_Lahir</th>
											<th>ID_Jenis_Kelamin</th>
											<th>Telp</th>
											<th>Alamat</th>
											<th>Keluhan</th>
											<th>Status</th>
							            </tr>
				            		";
				            		while($data = mysqli_fetch_array($query)){
			                        $test = $data['Nama'];
			                        
				                	echo "<tr>";
			                   		echo "<td> 	<h6>".$data['Antrian']."</td>";
				                	echo "<td> <h6>".$data['NIK']."</h6></td>";
				                	echo "<td> <h6>".$data['Nama']."</h6></td>";
				                	echo "<td><h6>".$data['Tanggal_Lahir']."</h6></td>";
				               		echo "<td><h6>".$data['ID_Jenis_Kelamin']."</h6></td>";
				                	$lenght = 4;
				                	$alamat = $data['Telp'];
				                	echo "<td> <h6>".substr($alamat, 0, $lenght).' ...'."</h6> </td>";
				               		$lenght = 10;
				                	$alamat = $data['Alamat'];
				                	echo "<td> <h6>".substr($alamat, 0, $lenght).' ...'."</h6> </td>";
			                    	echo "<td><h6>".$data['Keluhan']."</h6></td>";  
			                    	if ($data['Status']=='Blum Disetujui') {
			                    	echo "<td><a class='btn btn-info' href='validasi.php?id=$data[Antrian]' >".$data['Status']."</a></td>";
			                
			                   			 }
			                   			 else {
			                    	 echo '<td><button type="button" disabled>'.$data['Status']."</button></h6></td>";
			                  			  } 
				                	echo "<td> <a href='editpasien.php?id=$data[Antrian]' style='text-decoration: none;'><i class='material-icons' title='Edit $test'>mode_edit</i></a> | <a data-id='1' class='hapus' href='deletepasien.php?id=$data[Antrian]' style='text-decoration: none;'><i class='material-icons' title='Hapus $test'>delete</i></a>  </td></tr>";
			                      }
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