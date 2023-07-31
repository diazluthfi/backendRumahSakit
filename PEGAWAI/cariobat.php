<?php session_start();
include_once("../config.php");
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$result = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY ID_Obat DESC");

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
				<div class="col s12 m12 l12 offset-l2"> <br>
					<!--kolom search-->
					<div class="col s12 m12 l12">
						<form name="cari" method="post" action="" class="row">
	                    	<div class="e-input-field col s12 m12 l12">
	                    		<input type="text" name="cari" placeholder="Cari Berdasarkan Nama / NIK / Alamat / Telepon / Status  " class="validate" required title="Cari User">
	                    		<input type="submit" name="cari2" value="cari" class="btn right grey darken-2"> 
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
			                    $sql = "SELECT * FROM obat WHERE ID_Obat LIKE '%$cari%' OR Nama_Obat LIKE '%$cari%' OR Tanggal_Kadaluarsa LIKE '%$cari%' OR Harga LIKE '%$cari%'";
			                    $query = mysqli_query($conn,$sql);


			                      if($query!=NULL){
			                        
			                        
			                        
			                        
			                        echo "
			                        	<tr>
						                	<th >ID Obat</th>
											<th>Nama Obat</th>
											<th>Tanggal Kadaluarsa</th>
											<th>Harga</th
											
							            </tr>
				            		";
				            		while ($data=mysqli_fetch_array($query)) {
				            			$test = $data['Nama_Obat'];
			                        echo "<tr>";
			                  		echo "<td ><h6>".$data['ID_Obat']."</td>";
				              		echo "<td> <h6>".$data['Nama_Obat']."</h6></td>";
				               		echo "<td> <h6>".$data['Tanggal_Kadaluarsa']."</h6> </td>";
				             	    echo "<td><h6>".$data['Harga']."</h6></td>";			                    
				                     echo "<td> <a href='editobat.php?id=$data[ID_Obat]' style='text-decoration: none;'><i class='material-icons' title='Edit $test'>mode_edit</i></a> | <a data-id='1' class='hapus' href='deleteobat.php?id=$data[ID_Obat]' style='text-decoration: none;'><i class='material-icons' title='Hapus $test'>delete</i></a> </td></tr>";
			                      }
			                      }else{
			                      	echo "<table>";
			                        echo "<tr><td colspan='4'><center><h6><b>'$substr'</b> Tidak Ditemukan. Silahkan Periksa Kembali Keyword Anda</h6></center></td></tr>";
			                      }
			                    }
			                ?>

							
						</table>
						<table>
							<tr>
				            	<td colspan='9'>
				            		<a href='obat.php' class="right waves-effect waves-light btn grey darken-2">KEMBALI</a>
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
                $.post('deleteobat.php', {id: $(this).attr('data-id')},
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