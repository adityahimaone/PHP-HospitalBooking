<?php
session_start();
include_once("connection.php");

$query =  "SELECT * FROM patient where id_patient='{$_SESSION['norm']}'";
$result = mysqli_query($koneksi->connect, $query);
$row = mysqli_fetch_array($result);
$name = $row['name_patient'];
$id = $row['id_patient'];
$idnum = $row['identity_number'];
$tgl_lahir = $row['tgl_lahir'];
$address = $row['address_patient'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
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
    <link rel="stylesheet" href="assets/css/styles.css">
    
</head>
<body style="background: url(&quot;assets/img/pat.webp&quot;);">
    <header></header>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background: #008080;height: 61px;">
        <div class="container"><a class="navbar-brand" href="#" style="color: rgb(255,255,255);text-align: center;font-family: Allerta, sans-serif;border-style: none;text-shadow: 2px 0px 3px rgb(2,182,255);"><img class="img-fluid swing animated" src="assets/img/rs%20logo.png" style="width: 30px;margin: 0 10;filter: grayscale(0%);border-style: none;">RSUD Panembahan Senopati</a>
            <button
                data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <main></main>
    <div class="text-center d-flex d-xl-flex justify-content-center order-1 justify-content-xl-center" style="align-content: center;">
        <div class="container text-left" style="margin: 31px;">
            <div class="row" style="background: #edf6f9;border-style: none;border-radius: 30px;margin: 40px 0 0 0;box-shadow: 20px 40px 7px 3px rgba(33,37,41,0.7);">
                <div class="col-md-12">
                    <h4 class="text-center bounce animated" style="margin-top: 20px;">Data Pasien</h4>
                    <h5 class="text-center flash animated" style="margin: 10px 0 50px 0;">Pasien Terdaftar</h5>
                    <br><br>
                    <div class="row order-1">
                        <div class="col">
                            <div class="table-responsive table-borderless">
                                <table class="table table-bordered">
                                    <tbody style="border: none;">
                                        <tr>
                                            <td style="border: 0px;color: rgb(72,72,72);">
                                                Nama
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $row['name_patient']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 0px;color: rgb(72,72,72);">
                                                Nomor Rekam Medis
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $row['id_patient']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 0px;color: rgb(72,72,72);">
                                                NIK
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $row['identity_number']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 0px;color: rgb(72,72,72);">
                                                Tanggal Lahir
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $row['tgl_lahir']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 0px;color: rgb(72,72,72);">
                                                Alamat
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $row['address_patient']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="table-responsive table-borderless">
                                <table class="table table-bordered">


                                                              

                                    <tbody style="border: none;">
                                        <tr>
                                        <p style="text-align: center">Pendaftaran Aktif</p>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="col-md-12">
                                                    <div class="table-responsive table-light table-bordered" style="border-radius: 20px; border: 0.1px solid grey;">
                                                        <table class="table table-bordered table-striped">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>ID Pendaftaran</th>
                                                                <th>Nama</th>
                                                                <th>Poliklinik</th>
                                                                <th>Hari</th>
                                                                <th>Waktu</th>
                                                            </tr>

                                                            <?php
                                                            include_once("connection.php");

                                                            
                                                            $query =  "SELECT doc.name_doctor, cl.name_clinic, sc.day, sc.start, sc.end, bk.id_booking
                                                                        FROM clinic_schedule cs
                                                                        INNER JOIN doctor doc 
                                                                        ON cs.id_doctor = doc.id_doctor
                                                                        INNER JOIN clinic cl
                                                                        ON cs.id_clinic = cl.id_clinic
                                                                        INNER JOIN schedule sc 
                                                                        ON cs.id_schedule = sc.id_schedule 
                                                                        INNER JOIN booking bk 
                                                                        ON cs.id_clinic_schedule = bk.id_clinic_scheduling 
                                                                        WHERE bk.id_patient='{$_SESSION['norm']}'";

                                                            $result = mysqli_query($koneksi->connect, $query);
                                                            $i = 1;
                                                            while($row = mysqli_fetch_array($result))
                                                            {
                                                            ?>

                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                        echo $i . '.';
                                                                        $i++;
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $row['id_booking']?></td>
                                                                <td><?php echo $row['name_doctor']?></td>
                                                                <td><?php echo $row['name_clinic']?></td>
                                                                <td><?php echo ucfirst($row['day'])?></td>
                                                                <td><?php echo $row['start']. '-' . $row['end']//$end?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                    <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <button class="btn btn-outline-secondary btn-md btn-block" id="btn" data-toggle="modal" data-target="#exampleModalCenter">Batal Pendaftaran</button>
                                                        </div>

                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header" style="background: #008080">
                                                            <h6 style="color:white" class="modal-title" id="exampleModalLongTitle">Perhatian!</h6>
                                                            <a class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Anda yakin ingin membatalkan pendaftaran?</h4> 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-light" data-dismiss="modal">Tidak</a>
                                                            <a class="btn btn-primary" style="background: #008080" href="deletebooking.php?id=<?php echo $row['id_booking']?>">Ya</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-dark btn-md btn-block type="button" style="background: #008080">
                                                            <a href="cetak.php" style="color: #ffff;">Cetak</a>
                                                        </button>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br>
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
                                        <img class="tada animated infinite" src="assets/img/rs%20logo.png" style="width: 92px;" loading="auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="assets/js/Advanced-NavBar---Multi-dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>