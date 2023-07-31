<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM dokter ORDER BY nik DESC");
$result2 = mysqli_query($koneksi, "SELECT A.Nama, Telp, B.Spesialis FROM dokter A left join spesialis B on (A.Kode_Spesialis=B.Kode_Spesialis)");

?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Rumah Sakit Segar</title>
     <link  rel="shortcut icon" href="images/RSS.jpg>
<!--


-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Selamat Datang di Rumah Sakit Segar </p>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i> 010-060-0160</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 24 JAM</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">RumahSakitSegar@gmail.com</a></span>
                    </div>

               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="frontend.php" class="navbar-brand"><i class="fa fa-R-square"></i>Rumah Sakit Segar</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#top" class="smoothScroll">Beranda</a></li>
                         <li><a href="#about" class="smoothScroll">Tentang Kami</a></li>
                         <li><a href="#team" class="smoothScroll">Dokter</a></li>
                         <li><a href="#google-map" class="smoothScroll">Kontak</a></li>
                         <li class="appointment-btn"><a href="#appointment">Buat Perjanjian</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Ayo Buat Hidup Kamu Sehat</h3>
                                             <h1>Hidup Sehat</h1>
                                             <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our Doctors</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Rumah Sakit Segar</h3>
                                             <h1>Gaya Hidup Sehat</h1>
                                             <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">Info Kami</a>
                                        </div>
                                   </div>
                              </div>

                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Selamat Datang di Rumah Sakit Segar</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>Rumah Sakit Segar adalah Rumah Sakit Swasta yang siap melayani 24 jam lebih kepada semua  pasien yang membutuhkan perawatan dengan segala jenis penyakit. Rumah sakit ini juga memiliki peralatan kesehatan sesuai dengan standard WHO dan tentunya lengkap.
                                   </p>
                                   
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="images/dokterzuq.jpg" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3>Dr. Salman B.</h3>
                                        <p>General Principal</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="1">
          <div class="container">
               
                    
                    <form id="appointment-form" role="form" method="post" action="#">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>DOKTER</h2>
                              </div>
                    </form>
                          <!--table-->
                         <div class="col s12 m12 l12 card-panel z-depth"> <br><br>

                              <table class="table">
                                   <!--kolom header table-->
                                   <thead>
                                   <tr> 
                                        <td><b><h4>No.</h4></td>
                                        <td><b><h4>Nama</h4></td>
                                        <td><b><h4>No. Handphone</h4></td>
                                        <td><b><h4>Spesialis</h4></td>
                                       

                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $no=1;

                                   while($user_data = mysqli_fetch_array($result2)) { 
                                    echo "<tr>";
                                    echo "<td>".$no++."</td>";
                                    echo "<td><h5>".$user_data['Nama']."</h5></td>";
                                    echo "<td><h5>".$user_data['Telp']."</h5></td>"; 
                                    echo "<td><h5>".$user_data['Spesialis']."</h5></td>"; 
                                    echo "</tr>";
                                    
                                    
                                   }
                                   ?>

                                   </tbody>
                              </table>
                         </div>  
                  
                    
               
                   
          </div>
     </section>



     <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="#">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Buat Perjanjian</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <label for="name">NIK</label>
                                        <input type="text" class="form-control" id="name" name="NIK" placeholder="NIK">
                                   </div>
                                   <div class="col-md-6 col-sm-6">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="Nama" placeholder="Full Name">
                                   </div>
                                   <div class="col-md-6 col-sm-6">
                                        <label for="date">Tanggal Lahir</label>
                                        <input type="date" name="Tanggal_Lahir" value="" class="form-control">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Jenis Kelamin</label>
                                        <select name="ID_Jenis_Kelamin" class="form-control">
                                             <option value="01">Pria</option>
                                             <option value="02">Wanita</option>
                                        </select>
                                   </div>
                                   

                                   <div class="col-md-12 col-sm-12">
                                        <label for="name">Telp</label>
                                        <input type="text" class="form-control" id="name" name="Telp" placeholder="Nomor Telephone">
                                        <label for="name">Gmail</label>
                                        <input type="text" class="form-control" id="name" name="Gmail" placeholder="Gmail">
                                        <label for="telephone">Alamat</label>
                                        <input type="tel" class="form-control" id="Alamat Lengkap" name="Alamat" placeholder="Alamat lengkap">
                                        <label for="Message">Keluhan</label>
                                        <textarea class="form-control" rows="5" id="message" name="Keluhan" placeholder="Keluhan"></textarea>
                                        <button type="submit" class="form-control" id="cf-submit" name="tambah">Submit</button>
                                        <a href="frontend.php">
                                   </div>
                              </div>
                        </form>
                    </div>
                    <?php

          // Check If form submitted, insert form data into users table.
                if(isset($_POST['tambah'])) {
            $NIK = $_POST['NIK'];
            $Nama = $_POST['Nama'];
            $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
            $ID_Jenis_Kelamin = $_POST['ID_Jenis_Kelamin'];
            $Telp= $_POST['Telp'];
            $Gmail= $_POST['Gmail'];
            $Alamat = $_POST['Alamat'];
            $Keluhan = $_POST['Keluhan'];
            

            // include database connection file
            include_once("../config.php");

            // Insert user data into table
             $result = mysqli_query($koneksi, "INSERT INTO `pasien` (`NIK`, `Nama`, `Tanggal_Lahir`, `ID_Jenis_Kelamin`, `Telp`,`Gmail`, `Alamat`, `Keluhan`,`Status`) VALUES('$NIK','$Nama','$Tanggal_Lahir','$ID_Jenis_Kelamin','$Telp','$Gmail','$Alamat','$Keluhan','Blum Disetujui')");
            

            

          }
        ?>

        <!-- End -->
               </div>
          </div>
     </section>


     <!-- GOOGLE MAP -->
     <section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>           


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Info Kontak</h4>
                             

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">RumahSakitSegar@gmail.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Berita Seputar Kesehatan</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Penjelasan WHO tentang Omicron, Varian Baru COVID-19</h5></a>
                                        <span>01 Dec 2021</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Omicron di Indonesia: Kasus varian baru bertambah menjadi 254 orang, didominasi dari luar negeri</h5></a>
                                        <span>4 Januari 2022</span>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Melayani 24 Jam </h4>
                                   
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   
                              </div>
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>