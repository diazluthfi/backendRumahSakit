<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY NIK DESC");

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
$id = $_GET['id'];
// Check if form is submitted for user update, then redirect to homepage after update
 $result = mysqli_query($koneksi, "UPDATE pasien SET Status='Disetujui' WHERE Antrian= '$id'");
  $sql2 = "SELECT NIK, Nama, Tanggal_Lahir, ID_Jenis_Kelamin, Telp, Gmail, Alamat FROM pasien Where Antrian= '$id'";
  $result5 = mysqli_query($koneksi,$sql2);        
   $row2 = mysqli_fetch_array($result5);
            $NIK = $row2['NIK'];
            $Nama = $row2['Nama'];
            $Tanggal_Lahir = $row2['Tanggal_Lahir'];
            $ID_Jenis_Kelamin = $row2['ID_Jenis_Kelamin'];
            $Telp= $row2['Telp'];
            $Gmail= $row2['Gmail'];
            $Alamat = $row2['Alamat'];
           
            // include database connection file
            include_once("../config.php");

            // Insert user data into table
             $result3  = mysqli_query($koneksi, "INSERT INTO `riwayat` (`NIK`, `Nama`, `Tanggal_Lahir`, `ID_Jenis_Kelamin`, `Telp`,`Gmail`, `Alamat`) VALUES('$NIK','$Nama','$Tanggal_Lahir','$ID_Jenis_Kelamin','$Telp','$Gmail','$Alamat')");


  // Redirect to homepage to display updated user in list
$sql = "SELECT Gmail FROM pasien Where Antrian= '$id'";
$result2 = mysqli_query($koneksi,$sql);


// Numeric array
   $row = mysqli_fetch_array($result2);
   
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'RumahSakitSegar22@gmail.com';                     //SMTP username
    $mail->Password   = 'rumahsakit22';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('RumahSakitSegar22@gmail.com', 'pengirim');
    $mail->addAddress($row['Gmail'], 'penerima');     //Add a recipient
                 //Name is optional
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Rumah Sakit Segar';
    $mail->Body    = 'Perjanjian Anda Telah Disetujui Dan Silahkan Datang dan mengambil nomor Antrian Anda :)';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("Location: pasien.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 
?>