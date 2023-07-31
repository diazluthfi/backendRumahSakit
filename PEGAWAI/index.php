<?php
session_start();
require ( 'config.php' );

$kueri = mysqli_query($con, "SELECT * FROM Pegawai");

  $data = array ();
  while (($row = mysqli_fetch_array($kueri)) != null){
    $data[] = $row;
  }
    $cont = count ($data);
    $jml = "".$cont;


  $kueri3 = mysqli_query($con, "SELECT * FROM Pasien");

  $data3 = array ();
  while (($row = mysqli_fetch_array($kueri3)) != null){
    $data3[] = $row;
  }
    $cont3 = count ($data3);
    $jml3 = "".$cont3;

  $kueri4 = mysqli_query($con, "SELECT * FROM Obat");

  $data4 = array ();
  while (($row = mysqli_fetch_array($kueri4)) != null){
    $data4[] = $row;
  }
    $cont4 = count ($data4);
    $jml4 = "".$cont4;

  $kueri5 = mysqli_query($con, "SELECT * FROM Kamar");

  $data5 = array ();
  while (($row = mysqli_fetch_array($kueri5)) != null){
    $data5[] = $row;
  }
    $cont5 = count ($data5);
    $jml5 = "".$cont5;


  $kueri6 = mysqli_query($con, "SELECT * FROM Perawatan");

  $data6 = array ();
  while (($row = mysqli_fetch_array($kueri6)) != null){
    $data6[] = $row;
  }
    $cont6 = count ($data6);
    $jml6 = "".$cont6;

    $kueri7 = mysqli_query($con, "SELECT * FROM Spesialis");

  $data7 = array ();
  while (($row = mysqli_fetch_array($kueri7)) != null){
    $data7[] = $row;
  }
    $cont7 = count ($data7);
    $jml7 = "".$cont7;

    $kueri8 = mysqli_query($con, "SELECT * FROM bagian");

  $data8 = array ();
  while (($row = mysqli_fetch_array($kueri8)) != null){
    $data8[] = $row;
  }
    $cont8 = count ($data8);
    $jml8 = "".$cont8;

    $kueri9 = mysqli_query($con, "SELECT * FROM struk");

  $data9 = array ();
  while (($row = mysqli_fetch_array($kueri9)) != null){
    $data9[] = $row;
  }
    $cont9 = count ($data9);
    $jml9 = "".$cont9;

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
            <div class="col offset-l2 nav-wrapper">
              <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
              <a href="editpasswordpegawai.php">Ganti password</a>
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
        <div class="col s12 m12 l9 offset-l3">
          
          
  
                  <!--content Gudang-->
          <div class="col s12 m6 l6">
                    <div class="card grey lighten-5">
                        <div class="card-content grey-text text-darken-2">
                          <span class="card-title">Pasien

                              <p class="right"><?php echo $jml3; ?></p>
                          </span>
                        </div>

                        <div class="card-action">
                          <i class="material-icons left grey-text text-darken-2">visibility</i>
                          <a href="Pasien.php" class="grey-text text-darken-2">Lihat</a>
                        </div>
                    </div>
                  </div>


                  <!--content Barang Keluar-->
          <div class="col s12 m6 l6">
                    <div class="card grey lighten-5">
                        <div class="card-content grey-text text-darken-2">
                          <span class="card-title">Obat

                              <p class="right"><?php echo $jml4; ?></p>
                          </span>
                        </div>

                        <div class="card-action">
                          <i class="material-icons left grey-text text-darken-2">visibility</i>
                          <a href="Obat.php" class="grey-text text-darken-2">Lihat</a>
                        </div>
                    </div>
                  </div>
                    <!--content Gudang-->
          <div class="col s12 m6 l6">
                    <div class="card grey lighten-5">
                        <div class="card-content grey-text text-darken-2">
                          <span class="card-title">Kamar

                              <p class="right"><?php echo $jml5; ?></p>
                          </span>
                        </div>

                        <div class="card-action">
                          <i class="material-icons left grey-text text-darken-2">visibility</i>
                          <a href="kamar.php" class="grey-text text-darken-2">Lihat</a>
                        </div>
                    </div>
                  </div>
                  <!--content Gudang-->
          <div class="col s12 m6 l6">
                    <div class="card grey lighten-5">
                        <div class="card-content grey-text text-darken-2">
                          <span class="card-title">Perawatan

                              <p class="right"><?php echo $jml6; ?></p>
                          </span>
                        </div>

                        <div class="card-action">
                          <i class="material-icons left grey-text text-darken-2">visibility</i>
                          <a href="perawatan.php" class="grey-text text-darken-2">Lihat</a>
                        </div>
                    </div>
                  </div>
                  <!--content Gudang-->
          
          
          <div class="col s12 m6 l6">
                    <div class="card grey lighten-5">
                        <div class="card-content grey-text text-darken-2">
                          <span class="card-title">Struk

                              <p class="right"><?php echo $jml9; ?></p>
                          </span>
                        </div>

                        <div class="card-action">
                          <i class="material-icons left grey-text text-darken-2">visibility</i>
                          <a href="struk.php" class="grey-text text-darken-2">Lihat</a>
                        </div>
                    </div>
                  </div>
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
</body>
</html>
