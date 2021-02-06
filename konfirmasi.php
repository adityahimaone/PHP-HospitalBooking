<?php
session_start();
include_once("connection.php");

$query =  "SELECT * FROM patient where id_patient='{$_SESSION['norm']}'";
$result = mysqli_query($koneksi->connect, $query);
$row = mysqli_fetch_array($result);
$id = $row['id_patient'];
$name = $row['name_patient'];
$tgl_lahir = $row['tgl_lahir'];
$idnum = $row['identity_number'];
$address = $row['address_patient'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Daftar Rawat Jalan</title>
    <link rel="icon" href="assets/img/rs%20logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<body style="background: url(&quot;assets/img/pat.webp&quot;);">
    <header>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background: #008080;height: 61px;">
        <div class="container"><a class="navbar-brand" href="#" style="color: rgb(255,255,255);text-align: center;font-family: Allerta, sans-serif;border-style: none;text-shadow: 2px 0px 3px rgb(2,182,255);"><img class="img-fluid swing animated" src="assets/img/rs%20logo.png" style="width: 30px;margin: 0 10;filter: grayscale(0%);border-style: none;">RSUD Panembahan Senopati</a>
            <button
                data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                    </ul>
                </div>
        </div>
    </nav>
    </header>
    <main>
    <div class="text-center d-flex d-xl-flex justify-content-center order-1 justify-content-xl-center" style="align-content: center;">
        <div class="container text-left" style="margin: 21px;">
            <div class="row" style="background: #edf6f9;border-style: none;border-radius: 30px;margin: 20px 0 0 0;box-shadow: 20px 40px 7px 3px rgba(33,37,41,0.7);">
                <div class="col-md-12">
                    <h4 class="text-center bounce animated" style="margin-top: 20px;">Konfirmasi Data Pendaftaran</h4>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 12px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Perhatian</strong> Pastikan Data yang Anda Inputkan Sudah Benar!</span>
                    </div>
                    <div class="row order-1">
                        <div class="col">
                            <div class="table-responsive table-borderless">
                                <table class="table table-bordered">
                                    <tbody style="border: none;">
                                        <tr>
                                            <td style="border: 0px;color: rgb(72,72,72);">Nama</td>
                                            <td class="text-right" style="height: 29px;width: 0px;color: rgb(72,72,72);">:</td>
                                            <td><?php echo $name ?></td>
                                            <td style="color: rgb(72,72,72);">Poliklinik</td>
                                            <td class="text-right" style="color: rgb(72,72,72);">:</td>
                                            <td>
                                                <?php 
                                                $clinic = $_REQUEST['clinic'];
                                                $queryC = "SELECT * FROM clinic Where id_clinic=$clinic";
                                                $resultC = mysqli_query($koneksi->connect, $queryC);
                                                $row = mysqli_fetch_array($resultC);
                                                $name_clinic = $row['name_clinic'];
                                                echo $name_clinic;
                                                $_SESSION["print_policlinic"] = $name_clinic;
                                                $_SESSION["ses_policlinic"] = $clinic;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color: rgb(72,72,72);">Nomor Rekam Medis</td>
                                            <td class="text-right" style="color: rgb(72,72,72);">:</td>
                                            <td><?php echo $id ?></td>
                                            <td style="color: rgb(72,72,72);">Dokter</td>
                                            <td class="text-right" style="color: rgb(72,72,72);">:</td>
                                            <td>
                                                <?php
                                                   $doctor = $_REQUEST['doctor'];
                                                   $queryD = "SELECT * FROM doctor Where id_doctor=$doctor";
                                                   $resultD = mysqli_query($koneksi->connect, $queryD);
                                                   $row = mysqli_fetch_array($resultD);
                                                   $name_doctor = $row['name_doctor'];
                                                   echo $name_doctor;
                                                   $_SESSION["print_doctor"] = $name_doctor;
                                                   $_SESSION["ses_doctor"] = $doctor;
                                                ?>
                                               
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color: rgb(72,72,72);">NIK</td>
                                            <td class="text-right" style="color: rgb(72,72,72);">:</td>
                                            <td><?php echo $idnum ?></td>
                                            <td style="color: rgb(72,72,72);">Waktu</td>
                                            <td class="text-right" style="color: rgb(72,72,72);">:</td>
                                            <td>
                                                <?php
                                                  $time = $_REQUEST['time'];
                                                   $queryS = "SELECT * FROM schedule Where id_schedule=$time";
                                                   $resultS = mysqli_query($koneksi->connect, $queryS);
                                                   $row = mysqli_fetch_array($resultS);
                                                   $day = $row['day'];
                                                   $start = $row['start'];
                                                   echo ucfirst($day);
                                                   echo " ";
                                                   echo $start;
                                                   $_SESSION["print_time"] = $start;
                                                  $_SESSION["ses_time"] = $time;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color: rgb(72,72,72);">Tanggal Lahir</td>
                                            <td class="text-right" style="color: rgb(72,72,72);">:</td>
                                            <td><?php echo $tgl_lahir ?></td>
                                        </tr>
                                        <tr>
                                            <td style="color: rgb(72,72,72);">Alamat</td>
                                            <td class="text-right" style="color: rgb(72,72,72);">:</td>
                                            <td><?php echo $address ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center" style="padding: 56px;">
                                    <div class="btn-group" role="group" style="border-style: none;">
                                    <a href="basicdata.php">
                                    <button class="btn btn-primary text-center justify-content-xl-center align-items-xl-end" type="button" style="background: #b9cad6;color: #000000;font-weight: bold;border-style: none;">
                                    Kembali
                                    </button>
                                    </a>
                                    <button class="btn btn-primary" type="button" style="background: #dfe8ee;color: rgb(0,0,0);font-weight: bold;border-style: none;">
                                        <a href="process_simpan.php"><font style="color: rgb(0,0,0)">Lanjutkan</font></a>
                                    </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-inline order-1" style="width: 1142px;padding: 0;margin: -31px;height: 158px;border-radius: 0;">
                                <div class="col">
                                    <div class="jumbotron" style="padding: 4px;border-radius: 30px;margin: -30px;">
                                        <div class="row">
                                            <div class="col" style="margin: 10px;">
                                                <h5>Ketentuan Pendaftaran</h5>
                                                <ul>
                                                    <li>Pasien sudah terdaftar di RSUD BANTUL dan memiliki nomor rekam medis.</li>
                                                    <li>Bagi pasien baru yang belum pernah mendaftar di RSUD Panembahan Senopati harap datang langsung ke CS RSUD Panembahan Senopati</li>
                                                    <li>Apabila Anda telah melakukan pendaftaran Online, Anda akan mendapatkan bukti pendaftaran yang dapat dicetak dan dibawa pada Hari Berobat.</li>
                                                    <li>Untuk kasus Gawat Darurat silakan datang ke IGD RSUD Panembahan Senopati.</li>
                                                    <li>Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu (Minimal 1 jam sebelum jadwal Poli Dokter).</li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-4 d-xl-flex justify-content-xl-center align-items-xl-center">
                                                <div class="btn-group" role="group"></div><img class="tada animated infinite" src="assets/img/rs%20logo.png" style="width: 92px;" loading="auto"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="assets/js/Advanced-NavBar---Multi-dropdown.js"></script>
    <script>
      
    </script>
</body>

</html>