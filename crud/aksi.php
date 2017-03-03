<?php
 // memanggil koneksi
 require_once 'connect.php';

 // menentukan apakah proses berupa tamnbah, edit atau hapus
 $set = $_GET['set'];

  // proses tambah
 if($set == 'tambah'){
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];

  $sql = 'INSERT INTO data SET';
  $sql .= ' nama="'.$nama.'",';
  $sql .= ' alamat="'.$alamat.'"';
  $rs = mysql_query($sql);

  $user_id = mysql_insert_id();

  // untuk response ya saya menggunakan array agar bisa menjadi JSON
  $response = array(
   'error'=>false,
   'pesan'=>'Data berhasil di tambahkan'
  );

  // rubah bentuk array ke format JSON
  echo json_encode($response);

 // proses edit
 }elseif($set == 'edit'){
  $user_id = intval($_GET['id']);
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];

  $sql = 'UPDATE data SET';
  $sql .= ' nama="'.$nama.'",';
  $sql .= ' alamat="'.$alamat.'"';
  $sql .= ' WHERE id='.$user_id;
  mysql_query($sql);

  // untuk response ya saya menggunakan array agar bisa menjadi JSON
  $response = array(
   'error'=>false,
   'pesan'=>'Data berhasil di rubah'
  );

  // rubah bentuk array ke format JSON
  echo json_encode($response);

 // proses hapus
 }elseif($set == 'hapus'){
  $user_id = intval($_GET['id']);

  $sql = 'DELETE FROM data';
  $sql .= ' WHERE id='.$user_id;
  mysql_query($sql);

  // untuk response ya saya menggunakan array agar bisa menjadi JSON
  $response = array(
   'error'=>false,
   'pesan'=>'Data berhasil di hapus'
  );

  // rubah bentuk array ke format JSON
  echo json_encode($response);
 }
