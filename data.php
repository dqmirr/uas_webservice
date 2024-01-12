<?php

$conn = mysqli_connect('localhost', 'root', '', 'uas_regservice');
if (!$conn) {
    die('Gagal koneksi ke database: ' . mysqli_connect_error());
}

function cekStatusBayar($nim)
    {
        // Cek status pembayaran mahasiswa berdasarkan nomor mahasiswa
        $query = "SELECT status_bayar FROM mahasiswa WHERE nim = '$nim'";
        $result = mysqli_query($GLOBALS['conn'], $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $status = $row['status_bayar'];
        }

        return $status;
    }

function getDaftarMahasiswaBelumBayar()
    {
        // Ambil daftar mahasiswa yang belum membayar
        $query = "SELECT nim, nama, prodi FROM mahasiswa WHERE status_bayar = 'belum lunas'";
        $mahasiswa = mysqli_query($GLOBALS['conn'], $query);

        while($r = mysql_fetch_array($mahasiswa)){
            $items[] = array('nim'=>$r['nim'],'nama'=>$r['nama'],'prodi'=>$r['prodi'],'status_bayar'=>$r['status_bayar']); 
          }
          return $items;

    }


// function get_price($name)
// {
// 	$products = [
// 		"book"=>20,
// 		"pen"=>10,
// 		"pencil"=>5
// 	];
	
// 	foreach($products as $product=>$price)
// 	{
// 		if($product==$name)
// 		{
// 			return $price;
// 			break;
// 		}
// 	}
// }