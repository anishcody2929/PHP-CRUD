<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Failed Connection: " . mysqli_connect_error());
}
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $deleteSql = "DELETE FROM `notes` WHERE `S.No` = $id";
    if ($conn->query($deleteSql) === TRUE) {
      echo '<script>
        alert("Record deleted successfully.");
        window.location.href = "/crud/getn.php";
      </script>';
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID not provided for deletion.";
}
mysqli_close($conn);
?>