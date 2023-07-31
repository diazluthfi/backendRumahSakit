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
<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{ 
  $id = $_POST['id'];
  $pass2 = $_POST['password'];
    
  // update user data
  $result = mysqli_query($koneksi, "UPDATE pegawai SET password='$pass2' WHERE ID_Pegawai='$id'");

  echo "<script>alert('Ganti Password Berhasil !')</script>";
  
  // Redirect to homepage to display updated user in list
  header("Location:pegawai.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE ID_Pegawai='$id'");
 
while($user_data = mysqli_fetch_array($result))
{
  $nik = $user_data['NIK'];
  $name = $user_data['Nama']; 
  $str = $user_data['password'];
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
              <tr>
                <th>NIK</th>
                <th><input type="text" name="nik" value=<?php echo $nik; ?> disabled></th>
              </tr>
              <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $name;?> disabled></td>
              </tr>
              <tr> 
                <td>Password Lama</td>
                <td><input type="password" value=<?php echo $str; ?> id="pass" disabled></td>
                <td> <i class="material-icons" id="show" title="Lihat Password" onclick="ShowPassword()">visibility</i> <i class="material-icons"  style="display:none" id="hide" title="Sembunyikan Password" onclick="HidePassword()">visibility_off</i></td>
              </tr>
              <tr>
                <td>Password Baru</td>
                <td><input type="password" name="password"></td>
              </tr>
              <tr>
                  <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
              </tr>
              </table>
              <table>
                <tr>
                  <th>
                    <input type="submit" name="update" value="Edit Password" class="right waves-effect waves-light btn green darken-2" style="float: left;">
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

  </div>

  <script type="text/javascript" src="../jsa/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../jsa/materialize.min.js"></script>
  <script type="text/javascript">
    function ShowPassword()
    {
      if(document.getElementById("pass").value!="")
      {
        document.getElementById("pass").type="text";
        document.getElementById("show").style.display="none";
        document.getElementById("hide").style.display="block";
      }
    }

    function HidePassword()
    {
      if(document.getElementById("pass").type == "text")
      {
        document.getElementById("pass").type="password"
        document.getElementById("show").style.display="block";
        document.getElementById("hide").style.display="none";
      }
    }
  </script>
  <!-- End -->
  <script type="text/javascript">
      $(document).ready(function(){
        $('.collapsible').collapsible();
        $(".button-collapse").sideNav();
    });
  </script>
</body>
</html>