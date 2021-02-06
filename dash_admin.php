<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
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
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color: rgb(255,255,255);text-align: center;font-family: Allerta, sans-serif;border-style: none;">
        <img class="img-fluid swing animated" src="assets/img/rs%20logo.png" style="width: 30px;margin: 0 0;filter: grayscale(0%);border-style: none;">
        DASHBOARD ADMIN</a>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-10" style="background-color: white;  height:800px; margin-top:100px; margin-bottom:100px;">
            <div class="rows">
                <h4 style="color:black; text-align:center; margin-top:50px;">DATA PENDAFTARAN</h4>
            </div>

            <div class="row" style=" margin-top:70px;">
                <div class="col-md">
                    <div class="panel panel default">

                        <form action="" method="post">
                            <button type="submit" name="clear" class="btn btn-danger btn-lg btn-block" style="margin-bottom:50px;">HAPUS SEMUA</button>
                        </form>

                        <div class="panel-body">
                            <table class="table table-condensed table-striped" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pendaftaran</th>
                                        <th>Nomor Rekam Medis</th>
                                        <th>Klinik</th>
                                        <th>Antrian</th>
                                    </tr>
                                </thead>
                                <tbody id="records" >
                                    <?php

                                    require 'connection.php';

                                    if (isset($_POST["clear"])) {

                                        $del_query = "DELETE FROM booking";
                                        $upd_query = "UPDATE clinic set clinic.queue = 0 where clinic.queue != 0";
    
                                        $query_del = mysqli_query($koneksi->connect, $del_query);
                                        $query_upd = mysqli_query($koneksi->connect, $upd_query);
    
                                    }

                                    $get_query = "SELECT b.id_booking, b.id_patient, c.name_clinic, b.patient_queue from booking as b
                                    INNER JOIN clinic as c INNER JOIN clinic_schedule as cs where cs.id_clinic = c.id_clinic AND cs.id_clinic_schedule = b.id_clinic_scheduling;";

                                    $query = mysqli_query($koneksi->connect, $get_query);
                                    $num = 1;

                                    if (mysqli_num_rows($query) > 0){

                                        while ($row = mysqli_fetch_assoc($query)){
                                            
                                            echo '<tr>';
                                            echo '<td>'.$num++.'</td>';
                                            echo '<td>'.$row["id_booking"].'</td>';
                                            echo '<td>'.$row["id_patient"].'</td>';
                                            echo '<td>'.$row["name_clinic"].'</td>';
                                            echo '<td>'.$row["patient_queue"].'</td>';
                                            echo '</tr>';
                                        }

                                    } else {
                                        echo '<tr>';
                                        echo '<td colspan="5" align="center">No Data Found</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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

</body>

</html>