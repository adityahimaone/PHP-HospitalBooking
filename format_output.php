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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
    <style type="text/css">
        .col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%;
        }

    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin: 0;
    position: absolute;
    top: 98%;
    left: 30%;
    transform: translate(-50%, -50%);
    }


    .table-borderless tbody+tbody,
    .table-borderless td,
    .table-borderless th,
    .table-borderless thead th {
        border: 0;
    }

    .table td,
    .table th {
        padding: .75rem;
        vertical-align: top;
    }
    @media (min-width:1200px) {
        .justify-content-xl-center {
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }
    }

    @media (min-width:1200px) {
        .d-xl-flex {
            display: -ms-flexbox !important;
            display: flex !important;
        }
    }

    .qrcode {
    height: 200px;
    position: relative;
    margin: 0;
    position: absolute;
    top: 50%;
    left: 36%;
    transform: translate(-50%, -50%);
    }

    .img_head{
        height: 80px;
        margin-left: 15px;
        margin-top: -20px;
        margin-bottom: -40px;
        position: relative;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
            <div>
            <img class="img_head" src="assets/img/rs_logo.png" alt="qr">
            </div>
            <h3 class="text-center" style="text-align: center; margin: 0px 0px 10px 0px;">Rumah Sakit Panembahan Bantul</h3>
                <h3 class="text-center" style="text-align: center;margin: 0px 0px 10px 0px;">Booking Tiket</h3>
                <h4 class="text-center" style="text-align: center;margin: 0px 0px 10px 0px;">Registered Patient</h4>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="table-responsive table-borderless">
                            <table class="table table-bordered" style="align-content: center;" >
                                <tbody>
                                    <tr>
                                        <td style="width: 100px;">Klinik</td>
                                        <td class="text-center" style="width: 30px;">:</td>
                                        <td><?php echo $name_clinic; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Dokter</td>
                                        <td class="text-center">:</td>
                                        <td><?php echo $name_doctor; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td class="text-center">:</td>
                                        <td><?php echo $time; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomer Antrian</td>
                                        <td class="text-center">:</td>
                                        <td><?php echo $queue; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col  d-xl-flex justify-content-xl-center">
                            <img class="qrcode" src="temp/007_4.png" alt="qr">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>