<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY ID_Obat DESC");

if( !isset($_SESSION['ADMIN']) )
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
            $Nama_Obat = $_POST['Nama_Obat'];
            $Tanggal_Kadaluarsa = $_POST['Tanggal_Kadaluarsa'];
            $Harga = $_POST['Harga'];
            
            
    
  // update user data
  $result = mysqli_query($koneksi, "UPDATE obat SET Nama_Obat='$Nama_Obat',Tanggal_Kadaluarsa='$Tanggal_Kadaluarsa',Harga='$Harga' WHERE ID_Obat= '$id'");
  
  // Redirect to homepage to display updated user in list
  header("Location: obat.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM obat WHERE ID_Obat='$id'");
 
while($user_data = mysqli_fetch_array($result))
{
  $ID_Obat= $user_data['ID_Obat'];
  $Nama_Obat = $user_data['Nama_Obat'];
  $Tanggal_Kadaluarsa = $user_data['Tanggal_Kadaluarsa'];
  $Harga = $user_data['Harga'];
 
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

                    <li><a href="index.php" class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

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
                          <li><a href="Bidang.php">bagian</a></li>
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
              <tr>
                    <td>ID Obat</td>
                    <th><input type="text" name="ID_Obat" value=<?php echo $ID_Obat;?> disabled></th>
                  </tr>
                  <tr> 
                    <td>NIK</td>
                    <td><input type="text" name="Nama_Obat" value="<?php echo $Nama_Obat;?>"></td>
                  </tr>
                  <tr> 
                    <td>Tanggal Kadaluarsa</td>
                    <td><input type="date" name="Tanggal_Kadaluarsa"  value=<?php echo $Tanggal_Kadaluarsa;?>></td>
                  </tr>
                  <tr> 
                    <td>Harga</td>
                    <td><input type="text" name="Harga" value=<?php echo $Harga;?>></td>
                  </tr>
                  
                  </table>
                  <table>
                    <tr>
                      <th>
                        <input type="submit" name="update" value="Edit Obat" class="right waves-effect waves-light btn green darken-2" style="float: left;">
                      </th>
                      <th style="width: 1%;">
                        <a href="obat.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a> 
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