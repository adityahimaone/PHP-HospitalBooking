<?php
session_start();
$id_patient = $_SESSION['norm'];
include_once("connection.php");
$a = 0;

for ($i = 0; $i<6; $i++) 
{
    $a .= mt_rand(0,9);
}

$ab = strval($a); 
$aa = "RS-";
$kode = $aa.$ab;
$berhasil =0;
$ide_clinic = $_SESSION["ses_policlinic"];
$ide_doc = $_SESSION['ses_doctor'];
$ide_time = $_SESSION["ses_time"];
$queryS = "SELECT id_clinic_schedule FROM clinic_schedule WHERE id_clinic = '$ide_clinic' AND id_doctor = '$ide_doc' AND id_schedule = '$ide_time'";
$resultS = mysqli_query($koneksi->connect, $queryS);
$row = mysqli_fetch_assoc($resultS);
$id_clinic_scheduling = $row['id_clinic_schedule'];

echo $id_clinic_scheduling;

$id_clinic = $_SESSION['ses_policlinic'];

$query3 = "UPDATE clinic SET queue = queue+1 WHERE id_clinic = '$ide_clinic'";
mysqli_query($koneksi->connect, $query3);

$query2 = "SELECT queue FROM clinic WHERE id_clinic = '$id_clinic'";

$result2 = mysqli_query($koneksi->connect, $query2);
$queue_data = mysqli_fetch_array($result2);
$patient_data = $queue_data['queue'];

$_SESSION['kode_boking'] = $kode;
$query = "INSERT INTO booking (id_booking, id_patient, id_clinic_scheduling, patient_queue) VALUES ('$kode','$id_patient',$id_clinic_scheduling, $patient_data)";
$result = mysqli_query($koneksi->connect, $query);

if ($query == TRUE) {
    echo "New record created successfully";
    $berhasil = 1;
  } else {
    echo "Error: " . $query . "<br>";
}

if ($query2 == TRUE) {
    echo "Queue created successfully";
  } else {
    echo "Error Queue: " . $query2 . "<br>";
}

if ($berhasil==1){
    header("Location: cetak.php");
}else{
    echo "Gagal Proses";
}
?>