<?php 
include "koneksi.php";//untuk menghubungkan pada koneksi.php  
?>
<h3>Form Pencarian Dengan PHP MAHASISWA</h3>
<!-- #didalam sebuah form terdapat sebuah method get -->
<form action="" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
<?php 
#terdapat sebuah percabangan if yang didalam mengandung fungsi isset, fungsi ini akan menghasilkan nilai true jika sebuah pencarian yang dilakukan ada dalam sebuah tabel pencarian
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
#terdapat tabel, tabel ini berisi no, nim, kode MK, dan nil
?>
<table border="1">
<tr>
	<th>No</th>
	<th>Nama</th>
</tr>
<?php 
# terdapat sebuah percabangan if yang didalamnya mengandung isset, jika yang dicari ada dalam sebuah tabel maka akan menampilkan hasil pencarian tersebut
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$sql="select * from mahasiswa where Nama like'%".$cari."%'";#variabel sql ini berfungsi untuk menghubungkan kedalam sebuah database ,didalam variabel sql terdapat fungsi select untuk menampilkan data yang telah diinputkan kedalam database pada tabel mahasiswa, dan where ini berfungsi untuk mencari lebih spesifik yaitu nama yang ada dalam database
	$tampil = mysqli_query($con,$sql);
	//terdapat variabel tampi; yang didalmnya ada fungsi query yang digunakan untuk melakukan query terhadap database
}
else{
	//didalam percabangan else jika pencarian yang dilakukan tidak ada dalam sebuah tabel maka tidak akan menampilkan hasil yang dicari pada tabel mahasiswa
	$sql="select * from mahasiswa";
	$tampil = mysqli_query($con,$sql);
}
$no = 1;
# terdapat percabangan while , nantinya data yang telah diinputkan ke dalam database maka akan tampil pada halaman website
while($r = mysqli_fetch_array($tampil)){# mysqli_fetch_array untuk menampilkan data mysql, yaitu dengan menggunakan nama kolom yang ada dalam database, data yang akan tampil dalam tabel pada halam website yaitu ada nama
	?>
<tr>
	<td><?php echo $no++; ?></td>
	<td><?php echo $r['Nama']; ?></td>
</tr>
<?php } ?>
</table>