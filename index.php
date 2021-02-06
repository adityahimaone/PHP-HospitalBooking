<?php
session_start();

require 'connection.php';

if (isset($_POST["daftar"]))
{
    $admin = ":admin:";
    $norm = $_POST["NoRM"];
    $select_norm = mysqli_query($koneksi->connect, "SELECT * FROM booking WHERE id_patient = '$norm'"); 
    $cek_norm = mysqli_query($koneksi->connect, "SELECT * FROM patient WHERE id_patient = '$norm'");

    if ($norm === $admin){
        header("location:dash_admin.php");
    }

    if (mysqli_num_rows($cek_norm) === 1)
    {
        if (mysqli_num_rows($select_norm) === 1)
        {
            $_SESSION["boking"] = true;
            $_SESSION["norm"] = $norm;

            header("location:dashboard.php");
            exit;
        } else {
            $_SESSION["norm"] = $norm;
            header("location:basicdata.php");
        }
    } else {
        $error = true;
    }    
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pendaftaran Online RSUD Panembahan Bantul</title>
    <link rel="icon" href="assets/img/rs%20logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body style="background: url(&quot;assets/img/pat.webp&quot;);">

    <!-- Daftar Form -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" id="mh">
                    <div class="modal-title">
                        <h3>PENDAFTARAN KLINIK</h3>
                        <h5>PASIEN TERDAFTAR</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <!-- <input type="text" placeholder="Masukkan NIK/KIA" name="IN"> -->
                        <input type="text" placeholder="Masukkan No Rekam Medis" name="NoRM">
                        <?php if (isset($error)) : ?> 
                        <p style="color:red; margin-left:30px">No Rekam Medis tidak terdaftar</p>
                        <?php endif; ?>
                        <button type="submit" name="daftar">Daftar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="ketentuan">
                        <h5>KETENTUAN PENDAFTARAN</h5>
                        <ul>
                            <li>Pasien sudah terdaftar di RSUD BANTUL dan memiliki nomor rekam medis.</li>
                            <li>Bagi pasien baru yang belum pernah mendaftar di RSUD Panembahan Senopati harap datang langsung ke ...</li>
                            <li>Pendaftaran dapat dilakukan 1 BULAN s.d. 3 HARI sebelum pemeriksaan.</li>
                            <li>Pendaftaran untuk H-1 Maksimal dapat dilakukan sebelum jam 14.00, setelah jam tersebut pasien mendaftar di hari berikutnya. Untuk pendaftaran pemeriksaan hari senin minimal dilakukan pada hari jumat sebelum jam 14:00 WIB.</li>
                            <li>Apabila Anda telah melakukan pendaftaran Online, Anda akan mendapatkan Bukti pendaftaran yang dapat dicetak dan dibawa pada Hari Berobat.</li>
                            <li>Untuk kasus Gawat Darurat silakan datang ke IGD RSUD Panembahan Senopati.</li>
                            <li>Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu (Minimal 1 jam sebelum jadwal Poli Dokter).</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div>

        
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- NAVBAR -->
                    <div class="nav" data-aos="fade-up" data-aos-duration="1000">
                        <div class="logo">
                            <img src="assets/img/rs%20logo.png">
                            <h4>RSUD PANEMBAHAN SENOPATI</h4>
                        </div>

                        <div class="contact">
                            <i class="fa fa-phone-square">&nbsp;&nbsp;0274 - 367386, 2810721</i>
                            <i class="fa fa-fax">&nbsp;&nbsp;Fax. (0274) 367506</i>
                            <i class="fa fa-envelope"><a title="" href="mailto:rsudps@bantulkab.go.id"
                                    style="color:white;">&nbsp;&nbsp;rsudps@bantulkab.go.id</a></i>
                        </div>

                    </div>

                    <!-- CAROUSEL -->
                    <div class="carousel slide" data-ride="carousel" id="carousel-1">
                        <div class="carousel-inner">
                            <div class="carousel-item active"><img class="w-100 d-block"
                                    src="assets/img/og.png" alt="Slide Image">
                            </div>
                            <div class="carousel-item"><img class="w-100 d-block img-fluid"
                                    src="assets/img/cvd.png" alt="Slide Image">
                            </div>
                            <div class="carousel-item"><img class="w-100 d-block"
                                    src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image">
                            </div>
                        </div>
                        <!-- <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span
                                    class="carousel-control-prev-icon"></span><span
                                    class="sr-only">Previous</span></a><a class="carousel-control-next"
                                href="#carousel-1" role="button" data-slide="next"><span
                                    class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
                        </div> -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-1" data-slide-to="1"></li>
                            <li data-target="#carousel-1" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-wrapper">
        <div class="row">
            <div class="card-01" data-aos="fade-up" data-aos-duration="1000" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-user-plus fa-5x"></i>
                <h5>PENDAFTARAN ONLINE</h5>
            </div>
            <a href="jadwal.php" class="card-01" data-aos="fade-down" data-aos-duration="1000" style="color:white; text-decoration:none;">
            <div>
                <i class="fa fa-user-md fa-5x"></i>
                <h5>JADWAL DOKTER</h5>
            </div>
            </a>
        </div>
    </div>

    <div class="footer-basic" style="margin-top: 50px; background: url(&quot;assets/img/pat.webp&quot;);" >
        <footer>
            <!-- <div class="social">
                <a href="https://www.instagram.com/rsudps/">
                    <i class="icon ion-social-instagram"></i>
                </a>
                <a href="#">
                    <i class="icon ion-android-mail"></i>
                </a>
                <a href="#">
                    <i class="icon ion-social-twitter"></i>
                </a>
                    <a href="#"><i class="icon ion-social-facebook"></i>
                </a>
            </div> -->
            <!-- <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul> -->
            <p class="copyright" style="font-weight: bold;">18 BCI - UNIVERSITAS AMIKOM YOGYAKARTA © 2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>