<?php
	$id = $_GET['id'];
	require_once('../Connect.php');

	$query = "SELECT * FROM tugas_akhir WHERE id = $id ORDER BY tahun DESC, nama_pemilik";

	$r = mysqli_query($connect,$query);

	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"id"=>$row['id'],
			"no_induk"=>$row['no_induk'],
            "judul"=>$row['judul'],
            "nama_pemilik"=>$row['nama_pemilik'],
            "nama_pembimbing"=>$row['nama_pembimbing'],
            "tempat_pkl"=>$row['tempat_pkl'],
            "tahun"=>$row['tahun']
		));

	echo json_encode(array('result'=>$result));

	mysqli_close($connect);
?>
