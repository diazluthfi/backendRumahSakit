<?php

 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '';
 $dbname = 'rs_segar';

 $koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

 if( $koneksi->connect_error )
 {
 	die( 'Oops!! Koneksi Gagal : '. $koneksi->connect_error );
 }
 ?>