<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM dokter ORDER BY nik DESC");

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
  $id = $_POST['id'];
  $pass2 = $_POST['password'];
    
  // update user data
  $result = mysqli_query($koneksi, "UPDATE dokter SET password='$pass2' WHERE Nama='$nama'");

  echo "<script>alert('Ganti Password Berhasil !')</script>";
  
  // Redirect to homepage to display updated user in list
  header("Location:index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url

 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM dokter WHERE Nama='$nama'");
 
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
                <th><input type="text" name="nik" value=<?php echo $nik;?> disabled></th>
              </tr>
              <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>" disabled></td>
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
                  <td><input type="hidden" name="Nama" value=<?php echo $nama;?>></td>
              </tr>
              </table>
              <table>
                <tr>
                  <th>
                    <input type="submit" name="update" value="Edit Password" class="right waves-effect waves-light btn green darken-2" style="float: left;">
                  </th>
                  <th style="width: 1%;">
                    <a href="index.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a> 
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