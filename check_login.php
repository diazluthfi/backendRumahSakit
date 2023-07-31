<?php
session_start();

# check apakah ada akse post dari halaman login?, jika tidak kembali kehalaman depan
if( !isset($_POST['username']) ) { header('location:index.php'); exit(); }

# set nilai default dari error,
$error = '';

require ( 'config.php' );

$username = trim( $_POST['username'] );
$password = trim( $_POST['password'] );

if( strlen($username) < 2 )
{
	$error = "<script language='javascript'> alert('Username tidak boleh kosong'); </script>";
}else if( strlen($password) < 2 )
{
	# jika ada error dari kolom password yang kosong
	$error =  "<script language='javascript'> alert('Password tidak boleh kosong'); </script>";
}else{

	# Escape String, ubah semua karakter ke bentuk string
	$username = $koneksi->escape_string($username);
	$password = $koneksi->escape_string($password);


	# SQL command untuk memilih data berdasarkan parameter $username dan $password yang
	# di inputkan
	$sql = "SELECT Nama, Kode_Bagian FROM pegawai
			WHERE username='$username'
			AND password='$password' LIMIT 1";
	$sql2 = "SELECT Nama, Kode_Spesialis FROM dokter
			WHERE username='$username'
			AND password='$password' LIMIT 1";

	# melakukan perintah
	$query = $koneksi->query($sql);
	$query2 = $koneksi->query($sql2);

	# check query
	if( !$query )
	{
		die( 'Oops!! Database gagal '. $koneksi->error );
	}

	# check hasil perintah
	if( $query->num_rows == 1 )
	{

		$row =$query->fetch_assoc();


		$_SESSION['user'] = $row['Nama'];
		$_SESSION['akses'] = $row['Kode_Bagian'];

		if( $row['Kode_Bagian'] == 'ADMIN')
		{

			$_SESSION['ADMIN']= 'TRUE';
			header('location:'.$url.''.$_SESSION['akses'].'');
		}

		else
		{

			$_SESSION['PEGAWAI']= 'TRUE';
			header('location:PEGAWAI/index.php');
		}

		
		exit();

	}

	elseif( !$query2 )
	{
		die( 'Oops!! Database gagal '. $koneksi->error );
	}

	# check hasil perintah
	if( $query2->num_rows == 1 )
	{

		$row =$query2->fetch_assoc();


		$_SESSION['user'] = $row['Nama'];
		



			$_SESSION['DOKTER']= 'TRUE';
			
			header('location:DOKTER/index.php');
		

		
		exit();




	}else{


		$error = "<script language='javascript'> alert('Username atau password salah !'); </script>";
	}

}

if( !empty($error) )
{

	$_SESSION['error'] = $error;
	header('location:'.$url.'index.php');
	exit();
}
?>
