<!DOCTYPE html>
<?php include 'koneksi.php'; ?>
<html>
<head>
	<title>	aaaaaa</title>
</head>
<body>
<form method="post" action="">
<input type="text" name="kode_barang"><br><br>	
<input type="text" name="kategori"><br><br>
<input type="text" name="barang"><br><br>

<button type="submit" name="simpan">simpan</button>
</form>
<?php
    if(isset($_POST['simpan']))
    {
        $kategori=$_POST['kategori'];
        $barang=$_POST['barang'];
        $kode_barang=$_GET['kode_barang'];
        

        mysqli_query($koneksi,"update barang set 
            $kategori='$barang'
            where kode_barang='$kode_barang'");
                       
        echo"<script> alert('kode berhasil dikoreksi.');</script>";
        
        
    }
        ?>
</body>
</html>