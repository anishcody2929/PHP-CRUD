<?php
$servername="localhost";
$username="root";
$password="";
$database="notes";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  die("Failed Connection:"+mysqli_connect_error());
}
//echo $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD']=='POST'){
  $title=$_POST["title"];
  $description=$_POST["description"];
  $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
  $res = mysqli_query($conn, $sql);
  //echo $res;
  if ($res) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hurray!</strong> Note Added Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    echo '<script>
            setTimeout(function() {
              window.location.href = "/crud";
            }, 4000);
          </script>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>OOPS!</strong> Some Error Occurred.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Crud</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
  </nav>
  <div class="container my-4">
    <h2>Add Note</h2>
    <form action="/crud/index.php" method="post">
      <div class="form-group">
        <label for="title">Note Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
          placeholder="Enter Title">
      </div>
      <div class="form-group">
        <label for="description">Note Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
    <br/>
    <a href="/crud/getn.php" target="_blank"><button type="button" class="btn btn-primary">See All Notes</button></a>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>