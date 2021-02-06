<?php
include_once 'connection.php';
$sql = "DELETE FROM booking WHERE id_booking='" . $_GET["id"] . "'";
$result = mysqli_query($koneksi->connect, $sql);
if ($result) {
    session_start();
    session_destroy();
    header("location:index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
// mysqli_close($result);
?>