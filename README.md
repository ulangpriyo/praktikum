<h2>INPUT BUKU</h2>
	<hr>
<form action="proses.php" method="post" enctype="multipart/form-data">
<table border="0">
	<tr>
		<td>Kode</td>
		<td><input type="text" name="kode" /></td>
	</tr>
	<tr>
		<td>Judul Buku</td>
		<td><input type="text" name="judul" /><td>
	</tr>
	<tr>
		<td>Pengarang</td>
		<td><input type="text" name="pengarang" /><td>
	</tr>
	<tr>
		<td>Penerbit</td>
		<td><input type="text" name="penerbit" ><td>
	</tr>
	<tr>
		<td>Jumlah Stok</td>
		<td><input type="text" name="stok" /><td>
	</tr>
	<tr>
		<td>Foto Sampul</td>
		<td><input type="file" name="foto" size="50"></td>
	</tr>
</table>
<hr>
	<input type="submit" name="proses" value="Simpan"/> 
	<input type="reset" name="reset" value="Reset"/>
</form>	