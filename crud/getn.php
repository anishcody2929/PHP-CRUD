<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <title>Get Notes</title>
</head>
<body>
<div class="container my-4">
    <h2 class="mb-4">Notes</h2>
    <table class="table table-striped table-bordered" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "notes";
            $conn = mysqli_connect($servername, $username, $password, $database);
            if (!$conn) {
                die("Failed Connection: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM `notes`";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $sno = $sno + 1;
                $id = $row['S.No'];
                echo "<tr>
                    <th scope='row'>". $sno . "</th>
                    <td>". $row['title'] . "</td>
                    <td>". $row['description'] . "</td>
                    <td>
                        <form action='/crud/edit.php' method='get' style='display:inline;'>
                            <input type='hidden' name='id' value='{$id}'>
                            <button type='submit' class='btn btn-sm btn-primary'>Edit</button>
                        </form>
                        <form action='/crud/delete.php' method='get' style='display:inline;'>
                            <input type='hidden' name='id' value='{$id}'>
                            <button type='submit' class='btn btn-sm btn-danger'>delete</button>
                        </form>
                    </td>
                </tr>";
            } 
            ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
</body>
</html>
