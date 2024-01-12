<?php
require_once('vendor/econea/nusoap/src/nusoap.php');

$client = new nusoap_client("http://localhost/uas/server.php"); // Create a instance for nusoap client
$client->soap_defencoding = 'utf-8'; 
$client->encode_utf8 = false;
$client->decode_utf8 = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SOAP Web Service Client Side Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <?php
    $mahasiswa = $client->call('http://localhost/uas/server.php/getDaftarMahasiswaBelumBayar');
    $count = count($mahasiswa);
  ?>

<div class="container">
  <h2>SOAP Web Service Client Side Demo</h2>
  <table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i=0;$i<=$count-1;$i++){
        ?> 
         <tr>
            <td><?php echo $mahasiswa->nim ?></td>;
            <td><?php echo $mahasiswa->nama ?></td>;
            <td><?php echo $mahasiswa->prodi ?></td>;
            <td><?php echo $mahasiswa->status_bayar ?></td>;
         </tr>
         <?php
        }
        ?>
    </tbody>
</table>
  <form class="form-inline" action="" method="POST">
    <div class="form-group">
      <label for="NIM">NIM</label>
      <input type="text" name="NIM" class="form-control"  placeholder="Enter Product Name" required/>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
  <p>&nbsp;</p>
  <h3>
  <?php
	if(isset($_POST['submit']))
	{
		$nim = $_POST['nim'];
		
		$response = $client->call('http://localhost/uas/server.php/cekStatusBayar',array("nim"=>$nim));

		if(empty($response))
			echo 'Status pembayaran anda '.$response;
		else
			echo $response;
	}
   ?>
  </h3>
</div>
</body>
</html>