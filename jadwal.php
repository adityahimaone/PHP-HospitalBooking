<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Doctor Schedule</title>
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

    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background: rgb(0,128,128) 0%; height: 61px;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color: rgb(255,255,255);text-align: center;font-family: Allerta, sans-serif;border-style: none;"><img class="img-fluid swing animated" src="assets/img/rs%20logo.png" style="width: 30px;margin: 0 0;filter: grayscale(0%);border-style: none;">RSUD Panembahan
                Senopati</a>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-10" style="background-color: white; width: 1300px; height:800px; margin-top:100px; margin-bottom:100px; padding:24px;">
            <?php include("connection.php"); ?>
            <div class="rows">
                <h4 style="color:black; text-align:center;">JADWAL PERIKSA </h4>
                <p style="color:black; text-align:center;"><?php echo " \n  " . date(" \n d  M  Y") . " \n  "; ?></p>

                <!-- <span class="input-group-text" id="inputGroup-sizing-default" style="width: 200px; height:35px;">Tanggal : <?php echo " \n  " . date(" \n d  M  Y") . " \n  "; ?></span> -->
            </div>

            <div class="row" style=" margin-top:100px;">
                <div class="col d-inline-flex justify-content-start" style="margin-left: 30px;">
                    <div class="form-group">
                        <label for="clinic">Poliklinik Tujuan</label>
                        <select class="form-control" id="clinic" style="width: 350px; height:35px; border-radius:6px; background: linear-gradient(180deg, #FFFFFF 21.23%, rgba(173, 172, 172, 0) 100%);">
                            <option disabled selected>Pilih Poliklinik</option>
                            <?php
                            $query_get_clinic = "SELECT * FROM clinic";
                            $result_clinic = mysqli_query($koneksi->connect, $query_get_clinic);
                            if ($result_clinic->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result_clinic)) {
                                    echo "<option value='" . $row['id_clinic'] . "'>Poliklinik " . $row['name_clinic'] . "</option>";
                                }
                            }
                            
                            ?>
                        </select>
                    </div>
                </div>


                <div class=" col d-inline-flex flex-row-reverse" style="margin-right: 30px;">
                    <div class="form-group" style="margin-left: 30px;">
                        <label for="doctor">Dokter</label>
                        <select class="form-control" id="doctor" style="width: 350px; height:35px; border-radius:6px; background: linear-gradient(180deg, #FFFFFF 21.23%, rgba(173, 172, 172, 0) 100%);">
                            <option disabled selected>Pilih Dokter</option>
                            <?php
                            $query_get_doctor = "SELECT doctor.id_doctor, doctor.name_doctor FROM doctor ORDER BY name_doctor ASC";
                            $result_doctor = mysqli_query($koneksi->connect, $query_get_doctor);
                            if ($result_doctor->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result_doctor)) {
                                    echo "<option value='" . $row['id_doctor'] . "'> " . $row['name_doctor'] . "</option>";
                                }
                            }
                            mysqli_close($koneksi->connect);
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" style=" margin-top:70px;">
                <div class="col-md">
                    <div class="panel panel default">
                        <div class="panel-heading" style="text-align: center;">
                            <p>Jadwal Klinik</p>
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dokter</th>
                                        <th>Poliklinik</th>
                                        <th>Hari Praktek</th>
                                        <th>Jam Praktek</th>
                                    </tr>
                                </thead>
                                <tbody id="clinicSchedule">
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <br>
                        <!-- <hr style="height: 2px; background-color: grey;">
                        <br>
                        <div class="panel-heading" style="text-align: center;">
                            <p>Jadwal Dokter</p>
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dokter</th>
                                        <th>Poliklinik</th>
                                        <th>Hari Praktek</th>
                                        <th>Jam Praktek</th>
                                    </tr>
                                </thead>
                                <tbody id="doctorSchedule">
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- footer -->
            <div class="footer">

            </div>
        </div>
    </div>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="assets/js/Advanced-NavBar---Multi-dropdown.js"></script>
    <script src="assets/js/Advanced-NavBar---Multi-dropdown.js"></script>

    <script type="text/javascript">
        $('#clinic').on('change', function() {
            var clinic = $(this).val();
            $.ajax({
                url: 'ajaxData.php?action=scheduleClinic',
                type: 'GET',
                data: {
                    clinic: clinic
                },
                success: function(data) {
                    $('#clinicSchedule').html(data)
                }
            })
        });


        $('#doctor').on('change', function() {
            var doctor = $(this).val();
            $.ajax({
                url: 'ajaxData.php?action=scheduleDoctor',
                type: 'GET',
                data: {
                    doctor: doctor
                },
                success: function(data) {
                    $('#clinicSchedule').html(data)
                }
            })
        });
    </script>

</body>

</html>