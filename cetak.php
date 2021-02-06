<?php
session_start();
include_once("connection.php");
$id_patient = $_SESSION['norm'];
$query = "SELECT clinic.name_clinic, doctor.name_doctor, schedule.start, booking.id_booking, booking.patient_queue 
FROM booking INNER JOIN clinic_schedule ON booking.id_clinic_scheduling=clinic_schedule.id_clinic_schedule INNER JOIN clinic ON 
clinic_schedule.id_clinic=clinic.id_clinic INNER JOIN doctor ON clinic_schedule.id_doctor=doctor.id_doctor INNER JOIN schedule ON 
clinic_schedule.id_schedule=schedule.id_schedule WHERE booking.id_patient='$id_patient'"; 
$result = mysqli_query($koneksi->connect, $query);
$row = mysqli_fetch_array($result);
$name_clinic = $row['name_clinic'];
$name_doctor = $row['name_doctor'];
$time = $row['start'];
$queue = $row['patient_queue'];
$id_booking = $row['id_booking'];
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
    <div style="padding: 0;margin: 0 0 40px 0;">
        <div class="container">
            
            <div class="row" style="background: #edf6f9;border-radius: 30px;margin: 40px 0 0 0;box-shadow: 19px 36px 8px 9px rgba(33,37,41,0.58);">
                <div class="col-md-12">
                    <h4 class="text-center bounce animated" style="padding: 20px 0 0 0;">Tiket Pendaftaran</h4>
                    <div class="row">
                        <div class="col">
                            <h4 class="text-center" style="margin: 0;padding: 20px 0 0 0;">Poliklinik</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center"><label class="col-form-label text-center" style="font-size: 22px;"><?php echo $name_clinic; ?></label></div>
                    </div>
                    <div class="row">
                        <div class="col text-center"><label><?php echo $name_doctor; ?></label><br>
                        <label><?php echo $time; ?></label>
                            <div class="row">
                                <div class="col">
                                    <label style="font-size: 90px;">
                                    <?php
                                    //Nomor Antrian
                                    echo $queue;
                                      
                                    ?>
                                    </label>
                                    <div class="row">
                                        <div class="col">
                                        <?php 
                                            include "phpqrcode/qrlib.php"; 
                                            $tempdir = "temp/";
                                            if (!file_exists($tempdir))
                                               mkdir($tempdir);
                                            //isi qrcode jika di scan
                                            
                                            $codeContents =$id_booking; 
                                            QRcode::png($codeContents, $tempdir.'007_4.png', QR_ECLEVEL_L, 7, 2);
                                            
                                            echo '<img src="'.$tempdir.'007_4.png" />'; 
                                            
                                        ?>
                                            <div  style="margin: 0px 0px 30px 0px;"></div>
                                            <div class="row">
                                                <div class="col"><button class="btn btn-light" type="button" style="background: #008080;color:#fff;margin: 0px 0px 50px 0px;width: 88px;height: 39px;"><a href="process_output.php"><font style="color: #FFF;">Cetak</font></a></button>
                                                    <div class="row d-inline" style="border-radius: 0;">
                                                        <div class="col">
                                                            <div class="jumbotron" style="padding: 4px;border-radius: 30px;margin: -30px;">
                                                                <div class="row">
                                                                    <div class="col text-left" style="margin: 10px;">
                                                                    <h5>Ketentuan Pendaftaran</h5>
                                                                    <ul>
                                                                            <li>Pasien sudah terdaftar di RSUD BANTUL dan memiliki nomor rekam medis.</li>
                                                                            <li>Bagi pasien baru yang belum pernah mendaftar di RSUD Panembahan Senopati harap datang langsung ke CS RSUD Panembahan Senopati</li>
                                                                            <li>Apabila Anda telah melakukan pendaftaran Online, Anda akan mendapatkan bukti pendaftaran yang dapat dicetak dan dibawa pada Hari Berobat.</li>
                                                                            <li>Untuk kasus Gawat Darurat silakan datang ke IGD RSUD Panembahan Senopati.</li>
                                                                            <li>Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu (Minimal 1 jam sebelum jadwal Poli Dokter).</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xl-2 offset-xl-0 d-xl-flex justify-content-xl-center align-items-xl-center"><img class="tada animated infinite" src="assets/img/rs%20logo.png" style="width: 92px;" loading="auto"></div>
                                                                    <div class="col-xl-2 align-self-end"><button class="btn btn-primary" data-toggle="modal" data-target="#logout" type="button" style="background: #008080;border-style: none;color:#fff;font-weight: 600;margin: 12px;">Selesai</button></div>
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
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #008080">
                    <h5 class="modal-title"  style="color:#FFF">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin kembali ke halaman utama?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="logout.php"><button type="button" class="btn btn-primary" style="background: rgb(24,225,255);border-style: none;color: rgb(0,0,0);font-weight: 600">Ya</button></a>
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
</body>

</html>