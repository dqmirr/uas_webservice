<?php
require_once('vendor/econea/nusoap/src/nusoap.php');

$client = new nusoap_client("http://localhost/uas/server.php?wsdl"); // Create a instance for nusoap client

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>KRS</title>
</head>
<body>
    <div class="container">
    <form class="form-inline" action="" method="POST">
    <div class="form-group">
      <label for="name">Mata kuliah</label>
      <select name="" id="">
        <option>Front End</option>
        <option>Web Service</option>
        <option>Kecerdasan Komputasi</option>
      </select>
      <input type="" name="name" class="form-control"  placeholder="Enter Product Name" required/>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
  <p>&nbsp;</p>
  <h3>
    </div>
</body>
</html>