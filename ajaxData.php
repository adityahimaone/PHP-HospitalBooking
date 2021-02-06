<?php
include "connection.php";
$action = $_GET['action'];

switch ($action) {
    case 'doctor':
        echo '<option disabled selected> Pilih Dokter </option>';

        // get id clinic
        $id_clinic = $_GET['clinic'];
        // query join get doctor
        $query_get_doctor = "SELECT doc.id_doctor as id_doc, name_doctor FROM clinic_schedule cs INNER JOIN doctor doc ON cs.id_doctor = doc.id_doctor WHERE cs.id_clinic = '$id_clinic'";
        // execution query
        $query = mysqli_query($koneksi->connect, $query_get_doctor);
        // check if result > 0
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<option value=' .  $row['id_doc'] . '>' . $row['name_doctor'] . '</option>';
            }
        } else {
            echo '<option disabled selected>Dokter tidak ditemukan.</option>';
        }
        break;

    

    case 'schedule':
        // get id clinic
        $id_clinic = $_GET['clinic'];
        // query join get schedule
        $query_get_schedule = "SELECT doc.name_doctor as doc_name, sc.day, sc.start, sc.end
                            FROM clinic_schedule cs 
                            INNER JOIN doctor doc 
                            ON cs.id_doctor = doc.id_doctor 
                            INNER JOIN schedule sc
                            ON cs.id_schedule = sc.id_schedule
                            WHERE cs.id_clinic = '$id_clinic'";
        // execution query
        $query = mysqli_query($koneksi->connect, $query_get_schedule);
        // check if result > 0
        if (mysqli_num_rows($query) > 0) {
            $number = 1;
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<tr>';
                echo '<td>' . $number . '.</td>';
                echo '<td>' . $row['doc_name'] . '</td>';
                echo '<td>' . ucfirst($row['day']) . '</td>';
                echo '<td>' . $row['start'] . ' - ' . $row['end'] . '</td>';
                echo '</tr>';
                ++$number;
            }
        }
        break;

    case 'scheduleTime':
        echo '<option disabled selected> Pilih Waktu </option>';

        // get id doctor
        $id_doctor = $_GET['doctor'];
        // query join get schedule
        $query_get_schedule = "SELECT cs.id_schedule, sc.start, sc.end FROM clinic_schedule cs 
                                INNER JOIN schedule sc ON cs.id_schedule = sc.id_schedule 
                                WHERE cs.id_doctor = '$id_doctor'";
        // execution query
        $query = mysqli_query($koneksi->connect, $query_get_schedule);
        // check if result > 0
        if (mysqli_num_rows($query) > 0) {
            $number = 1;
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<option value=' . $row['id_schedule'] . '>' . $row['start'] . ' - ' . $row['end'] . '</option>';
            }
        }
        break;


        case 'doctorlist':
            echo '<option disabled selected> Pilih Dokter </option>';
    
            // get id clinic
            $id_doctor = $_GET['doctor'];
            // query join get doctor
            $query_get_doctor_list = "SELECT cs.id_schedule, sc.start, sc.end FROM clinic_schedule cs 
            INNER JOIN schedule sc ON cs.id_schedule = sc.id_schedule";
            // execution query
            $query = mysqli_query($koneksi->connect, $query_get_doctor_list);
            // check if result > 0
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<option value=' .  $row['id_doc'] . '>' . $row['name_doctor'] . '</option>';
                }
            } else {
                echo '<option disabled selected>Dokter tidak ditemukan.</option>';
            }
            break;

            case 'doctorschedule':
                // get id clinic
                $id_doctor = $_GET['doctor'];
                // query join get schedule
                $query_get_schedule = "SELECT doc.name_doctor as doc_name, sc.day, sc.start, sc.end
                                    FROM clinic_schedule cs 
                                    INNER JOIN doctor doc 
                                    ON cs.id_doctor = doc.id_doctor 
                                    INNER JOIN schedule sc
                                    ON cs.id_schedule = sc.id_schedule";
                // execution query
                $query = mysqli_query($koneksi->connect, $query_get_schedule);
                // check if result > 0
                if (mysqli_num_rows($query) > 0) {
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>';
                        echo '<td>' . $number . '.</td>';
                        echo '<td>' . $row['doc_name'] . '</td>';
                        echo '<td>' . $row['day'] . '</td>';
                        echo '<td>' . $row['start'] . ' - ' . $row['end'] . '</td>';
                        echo '</tr>';
                        ++$number;
                    }
                }
                break;

            case 'scheduleClinic':
            // get id clinic
            $id_clinic = $_GET['clinic'];
            // query join get schedule
            $query_get_schedule = "SELECT doc.name_doctor as doc_name, cl.name_clinic, sc.day, sc.start, sc.end
                                FROM clinic_schedule cs 
                                INNER JOIN doctor doc 
                                ON cs.id_doctor = doc.id_doctor 
                                INNER JOIN schedule sc
                                ON cs.id_schedule = sc.id_schedule
                                INNER JOIN clinic cl
                                ON cs.id_clinic = cl.id_clinic
                                WHERE cs.id_clinic = '$id_clinic';";
            // execution query
            $query = mysqli_query($koneksi->connect, $query_get_schedule);
            // check if result > 0
            if (mysqli_num_rows($query) > 0) {
                $number = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<tr>';
                    echo '<td>' . $number . '.</td>';
                    echo '<td>' . $row['doc_name'] . '</td>';
                    echo '<td>' . $row['name_clinic'] . '</td>';
                    echo '<td>' . ucfirst($row['day']) . '</td>';
                    echo '<td>' . $row['start'] . ' - ' . $row['end'] . '</td>';
                    echo '</tr>';
                    ++$number;
                }
            }
            break;

            case 'scheduleDoctor':
                // get id clinic
                $id_doctor = $_GET['doctor'];
                // query join get schedule
                $query_get_schedule = "SELECT doc.name_doctor as doc_name, cl.name_clinic, sc.day, sc.start, sc.end
                                        FROM clinic_schedule cs 
                                        INNER JOIN doctor doc 
                                        ON cs.id_doctor = doc.id_doctor 
                                        INNER JOIN schedule sc
                                        ON cs.id_schedule = sc.id_schedule
                                        INNER JOIN clinic cl
                                        ON cs.id_clinic = cl.id_clinic
                                        WHERE doc.id_doctor = '$id_doctor';";
                // execution query
                $query = mysqli_query($koneksi->connect, $query_get_schedule);
                // check if result > 0
                if (mysqli_num_rows($query) > 0) {
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>';
                        echo '<td>' . $number . '.</td>';
                        echo '<td>' . $row['doc_name'] . '</td>';
                        echo '<td>' . $row['name_clinic'] . '</td>';
                        echo '<td>' . ucfirst($row['day']) . '</td>';
                        echo '<td>' . $row['start'] . ' - ' . $row['end'] . '</td>';
                        echo '</tr>';
                        ++$number;
                    }
                }
                break;

            case 'scheduleClinic':
                // get id clinic
                $id_clinic = $_GET['clinic'];
                // query join get schedule
                $query_get_schedule = "SELECT doc.name_doctor as doc_name, cl.name_clinic, sc.day, sc.start, sc.end
                                    FROM clinic_schedule cs 
                                    INNER JOIN doctor doc 
                                    ON cs.id_doctor = doc.id_doctor 
                                    INNER JOIN schedule sc
                                    ON cs.id_schedule = sc.id_schedule
                                    INNER JOIN clinic cl
                                    ON cs.id_clinic = cl.id_clinic
                                    WHERE cs.id_clinic = '$id_clinic';";
                // execution query
                $query = mysqli_query($koneksi->connect, $query_get_schedule);
                // check if result > 0
                if (mysqli_num_rows($query) > 0) {
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>';
                        echo '<td>' . $number . '.</td>';
                        echo '<td>' . $row['doc_name'] . '</td>';
                        echo '<td>' . $row['name_clinic'] . '</td>';
                        echo '<td>' . ucfirst($row['day']) . '</td>';
                        echo '<td>' . $row['start'] . ' - ' . $row['end'] . '</td>';
                        echo '</tr>';
                        ++$number;
                    }
                }
                break;
        
            case 'scheduleDoctor':
                // get id clinic
                $id_doctor = $_GET['doctor'];
                // query join get schedule
                $query_get_schedule = "SELECT doc.name_doctor as doc_name, cl.name_clinic, sc.day, sc.start, sc.end
                                            FROM clinic_schedule cs 
                                            INNER JOIN doctor doc 
                                            ON cs.id_doctor = doc.id_doctor 
                                            INNER JOIN schedule sc
                                            ON cs.id_schedule = sc.id_schedule
                                            INNER JOIN clinic cl
                                            ON cs.id_clinic = cl.id_clinic
                                            WHERE doc.id_doctor = '$id_doctor';";
                // execution query
                $query = mysqli_query($koneksi->connect, $query_get_schedule);
                // check if result > 0
                if (mysqli_num_rows($query) > 0) {
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>';
                        echo '<td>' . $number . '.</td>';
                        echo '<td>' . $row['doc_name'] . '</td>';
                        echo '<td>' . $row['name_clinic'] . '</td>';
                        echo '<td>' . ucfirst($row['day']) . '</td>';
                        echo '<td>' . $row['start'] . ' - ' . $row['end'] . '</td>';
                        echo '</tr>';
                        ++$number;
                    }
                }
                break;
}
