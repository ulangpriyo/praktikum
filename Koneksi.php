<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	$host   = "localhost";
	$user   = "root";
	$pass   = "";
	$dbName = "dbsewabuku";

$kon = mysqli_connect($host, $user, $pass);
if (!$kon)
	die ("Gagal Koneksi...!!!");
	
$hasil = mysqli_select_db($kon, $dbName);
if (!$hasil)
{
	$hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
	if (!$hasil)
		die ("Gagal Buat Database...!!!");
	
	else
	$hasil = mysqli_select_db($kon, $dbName);
	if (!$hasil)
		die ("Gagal Connect Database...!!!");
}
$sqlTabelBuku =  "CREATE TABLE IF NOT EXISTS buku (
	idbuku int(11) auto_increment not null primary key,
	kode varchar (10) not null,
	judul varchar(40) not null,
	pengarang varchar(40) not null,
	penerbit varchar(40) not null,
	stok int(11) not null,
	foto varchar(40) not null default'',
	KEY s(kode))";

mysqli_query($kon, $sqlTabelBuku) or die ("Gagal Buat Buku");
echo "Tabel Buku Sudah Siap <hr/>";				  
?>