<?php
   $nama  = $_POST['nama'];
   $harga = $_POST['harga'];
   $stok  = $_POST['stok'];
   
   $foto   = $_FILES['foto'] ['name'];
   $tmpName= $_FILES['foto'] ['tmp_name'];
   $size   = $_FILES['foto'] ['size'];
   $type   = $_FILES['foto'] ['type'];
   
   $maxsize =1500000;
   $typeYgBoleh= array("image/jpeg","image/png","image/jpeg");
   
   $dirFoto="pict";
   if(!is_dir($dirFoto))
    mkdir($dirFoto);
	$fileTujuanFoto=$DIRfOTO."/".$foto;
	
	$dirThum ="thumb";
	if (!is_dir($dirThum))
	mkdir($dirThum);
	$fileTujuanThumb =$dirThumb."/t_".$foto;
	$gataValid="YA";
	if ($size > 0){
	    if ($size > $maxsize){
		  echo "Ukuran File Terlalu Besar <br/>";
		  $dataValid="TIDAK";
		  }
		  if (!in_array($type, $typeYgBoleh)) {
		     echo "Type File Tidak Dikenal <br/>";
			 $dataValid="TIDAK";
			 }
			 }
			 
			if (strlen(trim($nama))==0) {
			    echo "Nama Barang Harus Diisi! <br/>";
				$dataValid="TIDAK";
				
		     }
			 if (strlen(trim($harga)0==0) {
			    echo "Harga Harus Diisi <br/ >";
			 }
			 if (strlen(trim($stok))=0) {
			    echo "Harga Harus Diisi! <br/ >";
				$dataValid ="TIDAK";
				
			}
			if ($dataValid=="TIDAK") {
			    echo "Masih Ada Kesalahan, Silahkan Perbaiki! </br>";
				echo "<input type='button' value='kembali'
				       onClick='self.history.back()'>";
					   exit;
					   }
					   include "koneksi.php";
			$sql ="insert into barang
					   (nama,harga,stok,foto)
					   values
					   ('$nama','$harga','$stok','$foto')";
			$hasil = mysqli_error($kon,$sql);
            if (!$hasil) {
                echo "Gagal Simpan,Silahkan diulangi! <br />";
				echo mysqli_error($kon);
				echo "<br/> <input type='button' value='kembali'
				      onClick='self.history.back()'>";
					exit;
					}else{
					echo "Simpan Data Berhasil";
					}
					if ($size > 0){
					   if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
					       echo "Gagal upload Gambar..<br/>";
						   echo "a href='barang_tampil.php'>Daftar Barang</a>";
						   exit;
						 } else {
						    buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
							}
				    }
					echo "<br/>File sudah di aploud. <br/>";
					function buat_thumbnail($file_src,  $file_dst){
		list($w_src, $h_src, $type) = getImageSize($file_src);
		switch($type){
			case 1:
				$img_src = imagecreatefromgif($file_src);
				break;
			case 2:
				$img_src = imagecreatefromjpeg($file_src);
				break;
			case 3:
				$img_src = imagecreatefrompng($file_src);
				break;
		}
		
		$thumb = 100;
		if($w_src > $h_src){
			$w_dst = $thumb;
			$h_dst = round($thumb/$w_src * $h_src);
		}
		else{
			$w_dst = round($thumb/$w_src * $h_src);
			$h_dst = $thumb;
		}
		
		$img_dst = imagecreatetruecolor($w_dst, $h_dst);
	imagecopyresampled($img_dst, $img_src, 0, 0,0,0, $w_dst, $h_dst, $w_src, $h_src);
		imagejpeg($img_dst, $file_dst);
		imagedestroy($img_src);
		imagedestroy($img_dst);
	}
?>

					
				
			   
	